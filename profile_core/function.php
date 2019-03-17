<?php

require 'db.php';

function upload_file() {
    $dbh = new PDO("mysql:host=localhost;dbname=users", "andysafin", "bsgpdc1top1");
    if (isset($_POST['upload_btn'])){
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt = $dbh->prepare("INSERT INTO users VALUES('',?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $type);
    $stmt->bindParam(3, $data);
    $stmt->bindParam(1, $name);
    }
    // $file_result = "";

// if($_FILES["file"]["error"] > 0) {
//     $file_result .= "No File Uploaded or Invalid File ";
//     $file_result .= "Error Code: " . $_FILES["file"]["error"] . "<br>";
// } else {
//     $file_result .= 
//     "Upload: " . $_FILES["file"]["name"] . "<br>";
//     "Type: " . $_FILES["file"]["type"] . "<br>";
//     "Size: " . ($_FILES["file"]["size"] /1024) . " Kb<br>";
//     "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

//     move_uploaded_file($_FILES["file"]["tmp_name"],
//     "../images/users/" . $_FILES["file"]["name"]);

//     $file_result .= "File Uploaded Successfull!";
// }
}