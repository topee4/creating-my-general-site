<?php 

    unset($_SESSION['logged_user']);

    exit(header('Location: /'));
?>