<?php 
  require 'market_core/db.php';
?><!-- HEADER -->    

<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container card bg-light mb-3">
<div class="card-header"></div>

  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
    <h1 class="display-4">DRON - BLOG</h1>
      <p class="lead">Здесь Вы можете отслеживать мои достижения</p>
    </div>
  </div>
  <div class="card-footer"></div>

</div>


<!-- CONTAINER -->
  <div class="container">
    <div class="row card bg-light mb-3">
    <div class="card-header">Articles</div>
    
      <?php 
      $conn = connect();
      $id = $_GET['id'];
      $sql = "SELECT * FROM articles WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);

      if( mysqli_num_rows($result) > 0 ) {
        $out = array();
        while( $row = mysqli_fetch_assoc($result) ) {
          $out[$row['id']] = $row;
        }
        foreach ($out as $item) {
          $cat_name = $item['categorie_id'];
                  $sql = "SELECT name FROM articles_categorie_id WHERE categorie_id = '$cat_name'";
                    $result = mysqli_query($conn, $sql);
  ?>
  
      <div class="col-12 mt-3 mb-3">
        
          <div class="card border-dark mb-3">
          <div class="card-header"><h5><?php echo $item['title']; ?></h5></a></div>
              <div class="card-body text-dark">
                <h5 class="card-title"><img src="images/articles/<?php echo $item['img']; ?>" width="100%" height="100%" alt="image"></h5>
                <p class="card-text"><p><?php echo $item['description']; ?></p></p>
              </div>
            <div class="card-footer bg-transparent border-dark">
              <div class="_time"><?php echo $item['date']; ?></div>
                <div class="_categorie"><?php 

                     $cat_name = $item['categorie_id'];
                     $sql = "SELECT name FROM articles_categorie_id WHERE categorie_id = '$cat_name'";
                       $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0 ) {
                      $categorie_name = mysqli_fetch_assoc($result);
                      echo $categorie_name['name'];
                    }
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>
          <?php
            }
          }
      ?>

    </div>
  </div>
</div>
</div>