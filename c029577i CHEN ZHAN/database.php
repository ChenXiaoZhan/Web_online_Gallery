<?php
$host="web.fces.staffs.ac.uk";
$user="c029577i";
$password="c029577i";
$database = "c029577i";
$conn = new mysqli($host, $user, $password, $database);


if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
?>