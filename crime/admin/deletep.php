<?php

include 'config.php';

$id = $_GET['id'];

$deletequery = "delete from police where id=$id ";

$query = mysqli_query($conn,$deletequery);

header('location:mofficer.php');

?>