<?php

$DB_server = 'localhost';
$DB_username = 'root';
$DB_password = "";
$DB_name = 'crime';

$conn = mysqli_connect($DB_server, $DB_username, $DB_password, $DB_name);

if($conn)
{
    //echo "Connection successfull";
} else{
    die("no connection" . mysqli_connect_error());
}
?>