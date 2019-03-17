<?php 
  require 'market_core/db.php'
?><!-- HEADER -->    

<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container card bg-light mb-3">
<div class="card-header"></div>

  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
    <h1 class="display-4">DRON - GAME</h1>
      <p class="lead">Здесь Вы можете отдохнуть от своих дел и попробовать различные игры</p>
    </div>
  </div>
  <div class="card-footer"></div>

</div>


<!-- CONTAINER -->
  <div class="container">
    <div class="row card bg-light mb-3">
    <div class="card-header">Games</div>
    <div class="row">
    <?php
      $conn = connect();
      $sql = "SELECT * FROM games";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        $out = array();
        $num = 0;
        while($row = mysqli_fetch_assoc($result)){
          $out[$row['id']] = $row;
        }
        foreach ($out as $item) {
          $num += 1;
          ?>
            <div class="col-4">
              <div class="card border-dark mb-3 m-auto p-2">
                <div style="height: 200px">
                  <h1 class="text-center" style="line-height: 60px;"><?php echo $item['name']; ?></h1><h4 class="text-center">Описание:</h4>
                  <h6 class="text-center"><?php echo $item['description']; ?></h6>
                </div>
              </div><hr>
            </div>
          <div class="col-3">
            <div class="card border-dark mb-3 m-auto p-2">
              <div style="height: 200px" class="text-center">
              <p style="text-decoration: underline;">CATEGORIE:</p>
                <h2 style="line-height: 120px;">
            <?php 
              $conn = connect();
              $game_cat = $item['categorie_id'];
              $sql = "SELECT name FROM games_categorie WHERE categorie_id = $game_cat";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                  foreach ($row as $cat) {
                    echo $cat;
                  }
              }
            ?>
                </h2>
              </div>
            </div>
            <hr>
          </div>

          <div class="col-5">
            <div class="card border-dark mb-3">
                <div style="min-height: 200px" class="p-2">
                  <img  style="display: inline-block; margin-left: 10%; border: 1px solid black; border-radius: 5%;" src="../images/games/<?php echo $item['image']; ?>" alt="game" height="200px">
                  <h1 class="_play_btn p-3" onclick="openAll<?php if ($num == '1'){echo '2';} else { echo ''; } ?>()">PLAY</h1>
                </div>
            </div>
            <hr>
          </div>
          <?php 
        }
      }
      ?>


    </div>
  </div>
</div>
      <!-- GAME MODAL WINDOWS-->
      <!-- GAME MODAL WINDOWS-->
      <!-- GAME MODAL WINDOWS-->



</div>

<div id="modalGameWindow" style="display: none;">
<div id="isWindow">
    <div class="again timer">30sec</div>
    <div class="again start">START</div>
    <div id="wrap"></div>    
    <div class="again btn">MIX</div>
    <div id="closeModal"><img id="closeModalWindow" src="images/games/pokebal.png" alt="close" width="38px"></div>
</div>
</div>
<div class="hiddenTabs"></div>

<div id="modalGameWindow2" style="display: none;">
<div id="isWindow2">
        <table id="game">
                <tr>
                    <td id="s1"></td>
                    <td id="s2"></td>
                    <td id="s3"></td>
                </tr>
                <tr>
                    <td id="s4"></td>
                    <td id="s5"></td>
                    <td id="s6"></td>
                </tr>
                <tr>
                    <td id="s7"></td>
                    <td id="s8"></td>
                    <td id="s9"></td>
                </tr>
            </table>
            <h1><a class="re" onclick="cleanUp()">RESTART</a></h1>
            <div id="closeModal2"><img id="closeModalWindow2" src="images/games/pokebal.png" alt="close" width="38px"></div>
            
            <div class="statWindow">
                <div class="stat">
                    <p class="statPoint">Won X: </p>
                    <p class="statPoint">Won O: </p>
                    <p class="statPoint">Draw: </p>
                </div>
                <div class="stat place">
                    <h1>Message: <br><br><span></span></h1>
                </div>
            </div>
</div>
</div>
<!-- GAME MODAL WINDOWS-->
<!-- GAME MODAL WINDOWS-->
<!-- GAME MODAL WINDOWS-->

</div>