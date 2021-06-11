<?php

include 'config.php';

$id = $_GET['id'];

$deletequery = "delete from fir where case_id=$id ";

$query = mysqli_query($conn,$deletequery);

if($query){
    ?>
    <script>
        alert("CASE DELETED SUCCESSFULLY!!!!");
    </script>
    <?php
    header('location:mcase.php');
}
else{
    ?>
    <script>
        alert("CASE NOT DELETED !!!!");
    </script>
    <?php
}

?>