<?php

$servername = "localhost";
$username = "id8738490_andysafin";
$password = "bsgpdc1top1";
$dbname = "id8738490_andysafin_market";

function connect(){
    $conn = mysqli_connect("localhost", "id8738490_andysafin", "bsgpdc1top1", "id8738490_andysafin_market");
    if(!$conn){
        die ("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
