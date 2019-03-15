<?php

$route = $_GET['route'];
require 'log/db.php';

if($_POST['enter']){
    
    if( $route != "search/fruits" && $route != "search/vegetables" && $route != "search/market") {
        header('Location: /');
    } 
    $_SESSION['search'] = $_POST['text'];
    header('Location: /' . $route);
}
if ( isset($_POST['do_logout']) ) {
    require 'log/logout.php';
} else {
    require 'templates/header.php';
    require 'templates/header-navs.php';


    switch ($route){
        case '':
            require 'templates/main.php';
            break;
        case 'main':
            require 'templates/main.php';
            break;

        case 'login':
            require 'log/login.php';
            break;
        case 'signup':
            require 'log/signup.php';
            break;
        case 'logout':
            require 'log/logout.php';
            break;
            

        case 'market':
            require 'templates/market.php';
            break;
        case 'profile':
            require 'templates/profile.php';
            break;
        case 'article':
            require 'templates/article.php';
            break;
        case 'game':
            require 'templates/game.php';
            break;
        case 'basket':
            require 'templates/basket.php';
            break;
        case 'fruits':
            require 'templates/fruits.php';
            break;
        case 'vegetables':
            require 'templates/vegetables.php';
            break;
        case $route:
            require 'templates/search.php';
            break;
    }
    require 'templates/footer.php';
}


function searchForm () {
    global $route;
    echo '<form action="/search/' . $route . '" method="POST"><input type="text" name="text" placeholder="Поиск" required><input type="submit" name="enter" value="Искать"></form>';
}

function messageSend ($p1, $p2, $p3) {
    if($p1 == 1) $p1 = 'Ошибка';
    $_SESSION['message'] = '<div><b>'.$p1.'</b>: '.$p2.'</div>';
    header('Location: ' . $p3);
}