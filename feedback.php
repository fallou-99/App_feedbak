<?php include('partiel/header.php'); ?>


<?php 

$query = ( "SELECT * FROM feedbacks ORDER BY date DESC");
$resultats = mysqli_query($connect, $query);
$feedbacks = mysqli_fetch_all($resultats, MYSQLI_ASSOC);

?>




<div class="d-flex justify-content-center">
    <div class="container p-5">
        <div class="list-group">
            <?php foreach ($feedbacks as $feedback): ?>

            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h4><?php echo $feedback['nom'] ?></h4>
                    <small><?php echo $feedback['date'] ?></small>
                </div>
                <p><small><?php echo $feedback['email'] ?></small></p>
                <p><?php echo $feedback['message'] ?></p>
            </a>
                
            <?php  endforeach  ?>

        </div>
    </div>
</div>

</div>

<?php include('partiel/footer.php'); ?> 



































<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>