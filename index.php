<?php include('partiel/header.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $nom = $email = $messsage = '';
    $nomError = $emailError = $messageError = '';

    if (empty($_POST['nom'])) {
        $nomError = 'Le nom est obligatoire';
    }
    if (empty($_POST['mail'])) {
        $emailError = 'Le mail est obligatoire';
    }

    if (empty($_POST['message'])) {
        $messageError = 'Le message est obligatoire';
    }

    if(empty($nomError) && empty($emailError) && empty($messageError)){
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $messsage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);


        
        $query = ("INSERT INTO feedbacks (nom, email, message) VALUES ('$nom', '$email', '$messsage')");
        if(mysqli_query($connect, $query)){
            header('Location: /App_feedbak/feedback.php');
        }else{
            echo "une erreur est survenue lors de l'insertion".mysqli_error($connect);
        }
    }
}




?>


<div class="d-flex justify-content-center">
    <div class="">
        <img width="170" class=" d-block mx-auto my-5  " src="images/xarala.png" alt="">
        <div class="px-0 text-center fs-4">
            <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="mb-3">

                    <input type="text" class="form-control <?php echo empty($nomError) ? 'null' : 'is-invalid'; ?>" placeholder="Entrer votre nom d'utilisateur" name="nom">
                    <small class="invalid-feedback"><?php echo $nomError; ?></small>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control <?php echo empty($emailError) ? 'null' : 'is-invalid'; ?>" placeholder="Entrer votre e-mail" name="mail">
                    <small class="invalid-feedback"><?php echo $emailError; ?></small>


                </div>

                <div class="mb-3">

                    <textarea class="form-control <?php echo empty($messageError) ? 'null' : 'is-invalid'; ?>" placeholder="Entrer votre feedback" rows="3" name="message"></textarea>
                    <small class="invalid-feedback"><?php echo $messageError; ?></small>

                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-warning" name="submit">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php include('partiel/footer.php'); ?>




































<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>