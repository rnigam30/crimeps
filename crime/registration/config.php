<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "crime";

$con = mysqli_connect($server,$user,$password,$db);

if($con)
{
    ?>
        <script>
        alert("Connection successfull");
        </script>
    <?php
} 
else{
    ?>
        <script>
        alert("Connection is not successfull");
        </script>
    <?php
}

?>