<?php 

  $data = $_POST;
  if ( isset($data['do_signup']) ) {
    $errors = array();
    if( trim($data['login']) == '' ) {
        $errors[] = 'Введите логин!';
    }

    if( $data['password'] == '' ) {
        $errors[] = 'Введите пароль!';
    }

    if( $data['password_2'] != $data['password'] ) {
        $errors[] = 'Повторный пароль введен неверно!';
    }
    
    if( R::count('users', "login = ?" ,array($data['login'])) > 0 ) {
        $errors[] = 'Пользователь с таким лоигном уже существует!';
    }
    if( R::count('users', "email = ?" ,array($data['email'])) > 0 ) {
        $errors[] = 'Пользователь с таким Email уже существует!';
    }
    if( $data['email'] == '' ) {
        $errors[] = 'Введите Email!';
    }

    if( empty($errors) ) {
        //все хорошо - регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div class="_message" style="color: green;"><h4>Вы успешно зарегистрированы!<br><a href="/">Вернуться на главную</a></h4></div><hr>';
    } else {
        echo '<div class="_message" style="color: red;"><h4>' . array_shift($errors) . '</h4></div><hr>';
    }
    
  }

?>




 <!-- CONTAINER REGISTATION-AUTORIZATION-->
 <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
        
            <div class="alert alert-info" role="alert">
                <h2 class="test">Регистрация</h2>
            </div>
            
            <div class="alert alert-light" role="alert">
                <form action="signup" method="POST">
                    <div class="form-row">
                        <div class="col">
                        <label for="validationServer01">Login</label>
                        <input type="text" name="login" value="<?php echo @$data['login']; ?>" class="form-control is-valid" id="validationServer01" placeholder="First name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="col">
                        <label for="validationServer01">Email</label>
                        <input type="text" name="email" value="<?php echo @$data['email']; ?>" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                        <label for="validationServer03">Password</label>
                        <input type="password" name="password" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                        <label for="validationServer03">Password</label>
                        <input type="password" name="password_2" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit" name="do_signup">Зарегистрироваться</button>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
 </div>