
<!-- HEADER-NAVS -->
<div class="container-fluid">
      <div class="row">
        <div class="col">
          <a id="_main-logo" href="/"><img src="images/logo/logo.png" alt="logo"></a>
        </div>
        <div class="col-6">


<!-- NAVS --><div class="nav_">
  <a href="http://andrey-safin.com/main"><button type="button" id="_main-btn-active" class="btn btn-info _header_navs" data-check="main">main</button></a>
  <a href="http://andrey-safin.com/market"><button type="button" class="btn btn-info _header_navs" data-check="market">market</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">universe</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">nexus</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">esports</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">community</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">support</button></a>
  <a><button type="button" class="btn btn-info _header_navs" data-check="">merchandise</button></a>
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
          <a href="login">Авторизация</a> /
          <a href="signup">Регистрация</a>
        <?php endif; ?></div>
      </div>
       
      </div>
    </div>
  </div>
