<?php

$servername = "localhost";
$username = "andysafin";
$password = "bsgpdc1top1";
$dbname = "andysafin_market";

function connect(){
    $conn = mysqli_connect("localhost", "andysafin", "bsgpdc1top1", "andysafin_market");
    if(!$conn){
        die ("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
