<?php

$servername = "localhost";
$username = "andysafin";
$password = "bsgpdc1top1";
$dbname = "users";

function connect(){
    $conn = mysqli_connect("localhost", "andysafin", "bsgpdc1top1", "users");
    if(!$conn){
        die ("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

?>