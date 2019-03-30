<?php 

require 'market_core/db.php';

?>
<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container card bg-light mb-3">
    <div class="card-header"></div>
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
          <h1 class="display-4">DRON - SEARCH</h1>
          <p class="lead">Результат поиска: </p>
          <h4><a href="basket"><b><i class="_color">Перейти в корзину</i></b></a></h4>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
<!-- HEADER -->
<div class="container">
<?php include 'templates/header-menu.php'; ?>
</div>



<!-- CONTAINER -->
<div class="container _min-height">
    <div class="row card bg-light mb-3">
    <div class="card-header">Search</div>
    <div class="row">
<?php 
if ($route == "search_fruits") {
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `goods` WHERE `name` LIKE '%$session%' ";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-4 mt-3 mb-3">
                    <div class="_wrap">
                        <div class="_contents text-center">
                            <div class="card border-dark mb-3">
                                <div class="p-5 _card_img"><img src="images/goods/<?php echo $row['img']; ?>" width="100%"></div>
                                <div class="_card_h"><h5 style="font-size: 25px; box-shadow: 0px 0px 1px black; color: #ffc900"><?php echo $row['name']; ?></h5></div>
                                <div class="_card_p"><p><u>Цена</u>: <strong style="font-size: 25px;"><?php echo $row['cost']; ?></strong></p></div>
                                <div class="_card_p"><p>Описание: <i><?php echo $row['description']; ?></i></p></div>
                                <hr>
                                <div class="_card_btn">
                                    <button type="button" class="btn btn-warning _buy" style="color: lightyellow;" data-name="<?php echo $row['name']; ?>" data-id="<?php echo $row['id']; ?>">В корзину
                                    <div class="hiddenCart">
                                        <span>Добавлено<br> в корзину</span>
                                    </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        <?php
        }
    } else {
        ?>
            <h5 class="m-auto pt-5">Страница по вашему запросу не найдена. Введите другой запрос!</h5>
        </div>
        <?php

    }
    
    
    
    
} else if ($route == "search_vegetables") {
    $sql = "SELECT * FROM `vegetables` WHERE `name`LIKE '%&_SESSION['search']%' ORDER BY `id`";
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `vegetables` WHERE `name` LIKE '%$session%' ";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-4 mt-3 mb-3">
                    <div class="_wrap">
                        <div class="_contents text-center">
                            <div class="card border-dark mb-3">
                                <div class="p-5 _card_img"><img src="images/goods/<?php echo $row['img']; ?>" width="100%"></div>
                                <div class="_card_h"><h5 style="font-size: 25px; box-shadow: 0px 0px 1px black; color: #ffc900"><?php echo $row['name']; ?></h5></div>
                                <div class="_card_p"><p><u>Цена</u>: <strong style="font-size: 25px;"><?php echo $row['cost']; ?></strong></p></div>
                                <div class="_card_p"><p>Описание: <i><?php echo $row['description']; ?></i></p></div>
                                <hr>
                                <div class="_card_btn">
                                    <button type="button" class="btn btn-warning _buy" style="color: lightyellow;" data-name="<?php echo $row['name']; ?>" data-id="<?php echo $row['id']; ?>">В корзину
                                    <div class="hiddenCart">
                                        <span>Добавлено<br> в корзину</span>
                                    </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        <?php
        }
    } else {
        ?>
            <h5 class="m-auto pt-5">Страница по вашему запросу не найдена. Введите другой запрос!</h5>
        </div>
        <?php

    }
} else if ($route == "search_market") {
    $conn = connect();
    $session = $_SESSION['search'];
    $sql = "SELECT * FROM `goods` WHERE `name` LIKE '%$session%' ";
    $result = mysqli_query($conn, $sql);
    $out = '';
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-4 mt-3 mb-3">
                    <div class="_wrap">
                        <div class="_contents text-center">
                            <div class="card border-dark mb-3">
                                <div class="p-5 _card_img"><img src="images/goods/<?php echo $row['img']; ?>" width="100%"></div>
                                <div class="_card_h"><h5 style="font-size: 25px; box-shadow: 0px 0px 1px black; color: #ffc900"><?php echo $row['name']; ?></h5></div>
                                <div class="_card_p"><p><u>Цена</u>: <strong style="font-size: 25px;"><?php echo $row['cost']; ?></strong></p></div>
                                <div class="_card_p"><p>Описание: <i><?php echo $row['description']; ?></i></p></div>
                                <hr>
                                <div class="_card_btn">
                                    <button type="button" class="btn btn-warning _buy" style="color: lightyellow;" data-name="<?php echo $row['name']; ?>" data-id="<?php echo $row['id']; ?>">В корзину
                                    <div class="hiddenCart">
                                        <span>Добавлено<br> в корзину</span>
                                    </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        <?php
        }
    } else {
        $sql = "SELECT * FROM `vegetables` WHERE `name` LIKE '%$session%' ";
        $result = mysqli_query($conn, $sql);
        $out = '';
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-4 mt-3 mb-3">
                    <div class="_wrap">
                        <div class="_contents text-center">
                            <div class="card border-dark mb-3">
                                <div class="p-5 _card_img"><img src="images/goods/<?php echo $row['img']; ?>" width="100%"></div>
                                <div class="_card_h"><h5 style="font-size: 25px; box-shadow: 0px 0px 1px black; color: #ffc900"><?php echo $row['name']; ?></h5></div>
                                <div class="_card_p"><p><u>Цена</u>: <strong style="font-size: 25px;"><?php echo $row['cost']; ?></strong></p></div>
                                <div class="_card_p"><p>Описание: <i><?php echo $row['description']; ?></i></p></div>
                                <hr>
                                <div class="_card_btn">
                                    <button type="button" class="btn btn-warning _buy" style="color: lightyellow;" data-name="<?php echo $row['name']; ?>" data-id="<?php echo $row['id']; ?>">В корзину
                                    <div class="hiddenCart">
                                        <span>Добавлено<br> в корзину</span>
                                    </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <h5 class="m-auto pt-5">Страница по вашему запросу не найдена. Введите другой запрос!</h5>
            </div>
            <?php
        }
    }
}
?>
        </div>
    </div>
</div>



