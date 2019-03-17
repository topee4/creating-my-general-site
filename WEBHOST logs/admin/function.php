<?php
require '../market_core/db.php';

function init(){
    //вывожу список товаров
    $conn = connect();
    $sql = "SELECT id, name FROM goods";
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
    $sql = "SELECT * FROM goods WHERE id = '$id'";
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
    $img = $_POST['gimg'];

    $sql = "UPDATE goods SET name = '$name', cost = '$cost', description = '$descr', img = '$img' WHERE id = '$id'";

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
    $img = $_POST['gimg'];

    $sql = "INSERT INTO goods (name, cost, description, img)
    VALUES ('$name', '$cost', '$descr', '$img')";
    
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
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
    } else {
        echo "0";
    }
    $sql = "SELECT * FROM vegetables";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}