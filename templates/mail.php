<?php
    //Читать JSON файл

    $json = file_get_contents('../goods.json');
    $json = json_decode($json, true);

    //Письмо
    $message = '';
    $message .= '<h1>Заказ в магазине</h1>';
    $message .= '<p>Телефон: '.$_POST['ephone'].'</p>';
    $message .= '<p>Почта: '.$_POST['email'].'</p>';
    $message .= '<p>Клиент: '.$_POST['ename'].'</p>';

    $basket = $_POST['basket'];

    foreach ($basket as $id => $count) {
        //$message .= $json[$id]['name'];
    }
    print_r($message);