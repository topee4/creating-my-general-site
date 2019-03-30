<?php 

require 'market_core/db.php';

?>
<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">DRON - MARKET</h1>
          <p class="lead">Отличная цена и широкий выбор</p>
          <h4><a href="http://andrey-safin.com/basket"><b><i>Перейти в корзину</i></b></a></h4>
        </div>
      </div>
</div>
<!-- HEADER -->
<div class="container">

</div>



<!-- CONTAINER -->
<div class="container">
    <div class="row">
        <div class="_contents">
            <div class="_out"></div>
<?php 
if ($route == "search/fruits") {
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `goods` WHERE `name` = '$session'";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="_singleGoods">
            <img src="../images/goods/<?php echo $row['img']?>">
            <h5><?php echo $row['name']?></h5>
            <p><u>Цена</u>: <?php echo $row['cost']?></p>
            <p><?php echo $row['description']?></p>
            <hr>
            <button class="_buy" data-name="<?php echo $row['name']?>" data-id="<?php echo $row['id'] ?>">Купить</button>
        </div>
        <?php
        }
    } else {
        ?>
            <h5>Страница по вашему запросу не найдена. Введите другой запрос!</h5>
        </div>
        <?php

    }
    
    
    
    
} else if ($route == "search/vegetables") {
    $sql = "SELECT * FROM `vegetables` WHERE `name`LIKE '%&_SESSION['search']%' ORDER BY `id`";
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `vegetables` WHERE `name` = '$session'";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="_singleGoods">
            <img src="../images/goods/<?php echo $row['img']?>">
            <h5><?php echo $row['name']?></h5>
            <p><u>Цена</u>: <?php echo $row['cost']?></p>
            <p><?php echo $row['description']?></p>
            <hr>
            <button class="_buy" data-name="<?php echo $row['name']?>" data-id="<?php echo $row['id'] ?>">Купить</button>
        </div>
        <?php
        }
    } else {
        ?>
            <h5>Страница по вашему запросу не найдена. Введите другой запрос!</h5>
        </div>
        <?php

    }
} else if ($route == "search/market") {
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `goods` WHERE `name` = '$session'";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="_singleGoods">
            <img src="../images/goods/<?php echo $row['img']?>">
            <h5><?php echo $row['name']?></h5>
            <p><u>Цена</u>: <?php echo $row['cost']?></p>
            <p><?php echo $row['description']?></p>
            <hr>
            <button class="_buy" data-name="<?php echo $row['name']?>" data-id="<?php echo $row['id'] ?>">Купить</button>
        </div>
        <?php
        }
    } else {
        $sql = "SELECT * FROM `vegetables` WHERE `name` = '$session'";
        $result = mysqli_query($conn, $sql);
        $out = '';
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="_singleGoods">
                <img src="../images/goods/<?php echo $row['img']?>">
                <h5><?php echo $row['name']?></h5>
                <p><u>Цена</u>: <?php echo $row['cost']?></p>
                <p><?php echo $row['description']?></p>
                <hr>
                <button class="_buy" data-name="<?php echo $row['name']?>" data-id="<?php echo $row['id'] ?>">Купить</button>
            </div>
            <?php
            }
        } else {
            ?>
            <h5>Страница по вашему запросу не найдена. Введите другой запрос!</h5>
            </div>
            <?php
        }
    }
}
?>
        </div>
    </div>
</div>



