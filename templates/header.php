<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleBasket.css">
    <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
    <?php 
    switch ($route) {
        case 'login':
        case 'signup':
        echo '<link rel="stylesheet" href="css/login.css">';
        break;
    }
    ?>
    <title>AS market</title>
</head>
<body>
