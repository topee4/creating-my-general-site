
<!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS --><!-- FOOTER-NAVS -->
<div class="container-fluid bg-dark">
<div class="container-fluid">
    <div class="row">
      <div class="_left"></div>
      <div class="_right"></div>
    </div>
</div>
      <div class="row _footer">
        <div class="col"><h3>FOOTER</h3></div>
        <div class="col-6 text-center"><h1>FOOTER</h1></div>
      <div class="col text-right"><h3>FOOTER</h3></div>
    </div>
  </div>
  
<!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS --><!-- SCRITS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- FOR ALL -->
    <script src="js/main.js"></script>

    <?php
        switch ($route) {
            case '':
                break;
            case 'main':
                break;
            case 'game':
                echo '<script src="js/game.js"></script>';
                break;
            case 'profile':
                echo '<script src="js/profile.js"></script>';
                break;
            case 'market':
                echo '<script src="js/market.js"></script>';
                break;
            case 'fruits':
                echo '<script src="js/fruits.js"></script>';
                break;
            case 'vegetables':
                echo '<script src="js/vegetables.js"></script>';
                break;
            case 'basket':
                echo '<script src="js/basket.js"></script>';
                break;
            case $route:
                echo '<script src="../js/search.js"></script>';
                break;
        }
    ?>
</body>
</html>