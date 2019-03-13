<?php /* Объявление переменных для пагинатора*/
    require 'market_core/db.php';
    $conn = connect();
    $per_page = 6;
    $page = 1;

    if( isset($_GET['page']) ) {
        $page = (int) $_GET['page'];
    }



    $total_count_goods_q = mysqli_query($conn, "SELECT COUNT(`id`) AS `total_count` FROM `goods`");
    $total_count_goods = mysqli_fetch_assoc($total_count_goods_q);
    $total_count_goods = $total_count_goods['total_count'];

    $total_count_vegetables_q = mysqli_query($conn, "SELECT COUNT(id) AS total_count FROM vegetables");
    $total_count_vegetables = mysqli_fetch_assoc($total_count_vegetables_q);
    $total_count_vegetables = $total_count_vegetables['total_count'];

    $total_count = $total_count_goods + $total_count_vegetables;

    $total_pages = ceil($total_count / $per_page);
    if ( $page <= 1 || $page > $total_pages ) {
        $page = 1;
    }

    $offset = ($per_page * $page) - $per_page;
?>
<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container card bg-light mb-3">
    <div class="card-header"></div>
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
          <h1 class="display-4">DRON - MARKET</h1>
          <p class="lead">Отличная цена и широкий выбор</p>
          <h4><a href="basket"><b><i>Перейти в корзину</i></b></a></h4>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
<!-- HEADER -->
<div class="container">
    <?php include 'templates/header-menu.php';?>
</div>


<!-- CONTAINER -->
<div class="container">
    <div class="row">
        
        <div class="_contents">
            <div class="_out"></div>
            <?php 
    if ( $total_pages !=0 ) {
        ?>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" name="bottom" role="group" aria-label="First group">
        <?php
        echo '<div class="paginator">';
        if ( $page > 1 ) {
            echo '<a href="/market&page=' . ($page - 1) . '#bottom"><button type="button" data-page="' . ($page-1) . '" class="btn btn-secondary paginat_btn">Prev</button></a>';
        }
        for ($i = 1; $i < $total_pages+1; $i++) {
            ?>
            <a href="/market&page=<?php echo $i ?>#bottom"><button type="button" data-page="<?php echo $i?>" class="btn btn-secondary paginat_btn"><?php echo $i ?></button></a>
            <?php
        }
        if ( $page < $total_pages ) {
            echo '<a href="/market&page=' . ($page + 1) . '#bottom"><button type="button" data-page="' . ($page+1) . '" class="btn btn-secondary paginat_btn">Next</button></a>';

        }
        echo '</div>';
        ?>
        
        </div>
        <?php
    }
?>       
                
        </div>
            <?php 
                $result = mysqli_query ($conn, "SELECT * FROM `items` ORDER BY  `id` DESC LIMIT $offset, $per_page");
                if ( mysqli_num_rows($result) > 0 ) {
                    $out = array();
                    while ( $row = mysqli_fetch_assoc($result) ){
                        $out[$row['id']] = $row;
                    }
                    foreach ( $out as $item ) {
                    ?>
                        <div class="_singleGoods">
                            <img src="images/goods/<?php echo $item['img'] ?>">
                            <h5><?php echo $item['name'] ?></h5>
                            <p><u>Цена</u>: <?php echo $item['cost'] ?></p>
                            <p><?php echo $item['description'] ?></p>
                            <hr>
                            <button class="_buy" data-name="<?php echo $item['name'] ?>" data-id="<?php echo $item['id'] ?>">В корзину</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "0";
                }
                
                ?>
<?php 
    if ( $total_pages !=0 ) {
        ?>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" name="bottom" role="group" aria-label="First group">
        <?php
        echo '<div class="paginator">';
        if ( $page > 1 ) {
            echo '<a href="/market&page=' . ($page - 1) . '#bottom"><button type="button" data-page="' . ($page-1) . '" class="btn btn-secondary paginat_btn">Prev</button></a>';
        }
        for ($i = 1; $i < $total_pages+1; $i++) {
            ?>
            <a href="/market&page=<?php echo $i ?>#bottom"><button type="button" data-page="<?php echo $i?>" class="btn btn-secondary paginat_btn"><?php echo $i ?></button></a>
            <?php
        }
        if ( $page < $total_pages ) {
            echo '<a href="/market&page=' . ($page + 1) . '#bottom"><button type="button" data-page="' . ($page+1) . '" class="btn btn-secondary paginat_btn">Next</button></a>';

        }
        echo '</div>';
        ?>
        
        </div>
        <?php
    }
?>       
                
        </div>

    </div>
</div>