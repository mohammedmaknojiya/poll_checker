<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "poll";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect){

    die("Error". mysqli_connect_error());
}

?>