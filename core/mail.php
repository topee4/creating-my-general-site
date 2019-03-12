<?php
    //Читать JSON файл
    $json = file_get_contents('../goods.json');
    $json = json_decode($json, true);

    //Письмо
    $message = '';
    $message .= '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Message</title>
    </head>
    <body>';
    $message .= '<h1>Заказ в магазине</h1>';
    $message .= '<p>Телефон: '.$_POST['ephone'].'</p>';
    $message .= '<p>Почта: '.$_POST['email'].'</p>';
    $message .= '<p>Клиент: '.$_POST['ename'].'</p>';

    $basket = $_POST['basket'];

    foreach ($basket as $id => $count) {
        $message .= $json[$id]['name'].': ';
        $message .= $count.': ';
        $message .= $count*$json[$id]['cost'];
        $message .='<br>';
        $sum += $count*$json[$id]['cost'];
    }
    $message .= 'Всего: ' . $sum;
    //print_r($message);
    
    $to = 'andeesafin@gmail.com' . ',';
    $to .= $_POST['email'];
    $spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

    if($m) {echo 1;} else {echo 0;};
    