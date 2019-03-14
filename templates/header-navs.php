
<!-- HEADER-NAVS -->

<div class="container-fluid bg-dark">
<div class="container-fluid">
    <div class="row">
      <div class="_left"></div>
      <div class="_right"></div>
    </div>
  </div>
      <div class="row">
        <div class="col">
          <a id="_main-logo" href="/main"><img src="images/logo/logo.png" alt="logo" height="45vh"></a>
        </div>
        <div class="col-6">

<!-- NAVS --><div class="nav_">
  <a href="http://andrey-safin.com/main"><button type="button" class="btn btn-light _header_navs _header_navs_before" data-check="main">main</button></a>
  <a href="http://andrey-safin.com/market"><button type="button" class="btn btn-light _header_navs _header_navs_before" data-check="market">market</button></a>
  <a href="game"><button type="button" class="btn btn-light _header_navs _header_navs_before" data-check="game">game</button></a>
  <a href="pages/portfolio/index.php"><button type="button" class="btn btn-light _header_navs_before" data-check="about">about</button></a>
  
</div>
            

      </div>
      <div class="col text-right">
      <div class="row">
      <div class="col-6"></div>
       <div class="col-6"> <?php if ( isset($_SESSION['logged_user']) ) : ?>
              Авторизован!<br>
              Привет, <?php echo $_SESSION['logged_user']->login ?>
              <hr>
              <form action="logout" method="POST">
                <button type="submit" name="do_logout" class="btn btn-primary">Выйти</button>
              </form>
            <?php else : ?>
          <a href="login" style="color: white;">Авторизация</a> <span style="color: white;"> / </span>
          <a href="signup" style="color: white;">Регистрация</a>
        <?php endif; ?></div>
      </div>
       
      </div>
    </div>
  </div>
