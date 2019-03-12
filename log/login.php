<?php
    
    
    

    $data = $_POST;
    if( isset($data['do_login']) ) {
        $errors = array();
        $user = R::findOne('users', 'email = ?', array($data['email']));
        if( $user ) {
            if ( $data['password'] == '' ) {
                $errors[] = 'Введите пароль!';
            } else if ( password_verify($data['password'], $user->password) ) {
                // все хорошо, логиним пользователя
                $_SESSION['logged_user'] = $user;
                echo '<div class="_message" style="color: green;"><h4>Добро пожаловать ' . $user['login'] . '!<br>Можете вернуться на <a href="/">главную</a></h4></div><hr>';
            } else {
                $errors[] = 'Неверно введён пароль!';
            }
        } else {
            $errors[] = 'Пользователь с таким логином не найден!';
        }

        if( ! empty($errors) ) {
            echo '<div class="_message" style="color: red;"><h4>' . array_shift($errors) . '</h4></div><hr>';
        }
    }
    
?>



 <!-- CONTAINER REGISTATION-AUTORIZATION-->
 <div class="container">
    <div class="row">
      <div class="col-4 mt-4 mb-4"></div>
      <div class="col-4 mt-4 mb-4">

      <div class="alert alert-info" role="alert">
        <h2 class="test">Авторизация</h2>
      </div>
        <div class="alert alert-light" role="alert">
          <form class="_under_login" action="login" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <!-- LOGIN -->
              <input type="email" name="email" value="<?php echo @$data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <!-- PASSWORD -->
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" name="do_login" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
      <div class="col-4 mt-4 mb-4"></div>
    </div>
  </div>