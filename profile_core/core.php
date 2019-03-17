<?php




$action = $_POST['file'];

require_once 'function.php'; 

switch ($action) {
    case 'file' :
        upload_file();
        break;
}