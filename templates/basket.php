<!-- TITLE  (AFTER NAV-HEADER) -->

<div class="container card bg-light mb-3">
    <div class="card-header"></div>
    <div class="jumbotron jumbotron-fluid bg-light _basket-height">
        <div class="container">
            <h1 class="display-4" id="_title">DRON - BASKET</h1>
            
<!-- SEND EMAIL -->
<div class="container _contact-form">
    <div class="row">
      <div class="col-4 mt-4 mb-4"></div>
      <div class="col-4 mt-4 mb-4 _hide">

      <div class="alert alert-info" style="border: 1px solid black;" role="alert">
        <h2>Contact form</h2>
      </div>
        <div class="alert alert-light" style="border: 1px solid black;" role="alert">
          <form class="_under_login" action="login" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input id="ename" type="text" name="email" value="<?php echo @$data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input id="email" type="text" name="email" value="<?php echo @$data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mobile phone</label>
              <input id="ephone" type="text" name="email" value="<?php echo @$data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter mobile phone">
            </div>
            <button type="submit" name="do_login" class="btn btn-primary _send-email">Submit</button>
          </form>
        </div>

      </div>
      <div class="col-4 mt-4 mb-4"></div>
    </div>
  </div>
            <p class="lead" id="_title_p">Здесь находятся Ваши покупки</p>
            <h4><a href="market"><b><i class="_color">Вернутся в магазин</i></b></a></h4>  
                      
        </div>
    </div>
    <div class="card-footer"></div>
</div>

<div class="container _min-height _hide">
<div class="row card bg-light mb-3">
    <div class="card-header">Basket</div>
    <div class="row _out">
        
    </div>
</div>
</div>


  <!-- CONTACT FORM -->

  <!-- <div class="container">
    
    <div class="row">
        
        <div class="_email-field">
         <div class="row">
            <div class="col">
                <p>Имя: </p>
                <p>E-mail: </p>
                <p>Телефон: </p>
            </div>
            <div class="col">
                <p><input type="text" id="ename"></p>
                <p><input type="text" id="email"></p>
                <p><input type="text" id="ephone"></p>
            </div>
        </div>
            <button class="_send-email">Заказать</button>
        </div>
    </div>
</div> -->