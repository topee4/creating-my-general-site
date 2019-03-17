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
    writeJSON();
}

function init(){
    //вывожу список товаров
    $conn = connect();
    $sql = "SELECT id, name FROM vegetables";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function selectOneGoods(){
    $conn = connect();
    $id = $_POST['gid'];
    $sql = "SELECT * FROM vegetables WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function updateGoods(){
    $conn = connect();

    $id = $_POST['gid'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord = $_POST['gorder'];
    $img = $_POST['gimg'];

    $sql = "UPDATE vegetables SET name = '$name', cost = '$cost', description = '$descr', ord = '$ord', img = '$img' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "1";
    } else {
        echo "Error updating record: " . $mysqli_error($conn);
    }

    mysqli_close($conn);
    writeJSON ();
}

function newGoods(){
    $conn = connect();

    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord = $_POST['gorder'];
    $img = $_POST['gimg'];

    $sql = "INSERT INTO vegetables (name, cost, description, ord, img)
    VALUES ('$name', '$cost', '$descr', '$ord', '$img')";
    
    if (mysqli_query($conn, $sql)) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    writeJSON ();
}

function writeJSON () {
    $conn = connect();
    $sql = "SELECT * FROM items";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        $a = file_put_contents ('../items.json', json_encode($out));
        echo 'write+' . $a;
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function loadGoods () {
    $conn = connect();
    $sql = "SELECT * FROM vegetables";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function loadFruits () {
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}