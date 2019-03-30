<?php 
//UPDATE
require 'profile_core/db.php';
$conn = connect();

if (isset($_POST['update'])){
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $bio = $_POST['bio'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];
  $sql = "UPDATE users SET name = '$name', surname = '$surname', bio = '$bio', phone = '$phone', location = '$location'";
  $result = mysqli_query($conn, $sql);
}





//UPDATE//

$login = $_SESSION['logged_user']->login;
$msg = "";

if (isset($_POST['upload'])){
$target = "images/users/".basename($_FILES['image']['name']);

$image = $_FILES['image']['name'];


$sql = "UPDATE users SET image = '$image' WHERE login = '$login'";
mysqli_query($conn, $sql);

if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  $msg = "Image uploaded successfully";
} else {
  $msg = "There was a problem uploading image";
}
}
?>
<!-- HEADER -->
<!-- TITLE  (AFTER NAV-HEADER) -->
<div class="container card bg-light mb-3">
<div class="card-header"></div>
  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
    <h1 class="display-4">DRON - PROFILE</h1>
      <p class="lead">Здесь Вы можете редактировать свой профиль</p>
    </div>
  </div>
  <div class="card-footer"></div>

</div>


<!-- CONTAINER -->
  <div class="container">
    <div class="row card bg-light mb-3">
    <div class="position-relative">
      <!-- ACCORDION -->
      <div class="accordion" id="accordionExample">
  <div class="card-header">Profile</div>

    
  <div class="row">
    <div class="bg-dark text-white _prof text-center _prof_left _active_prof" data-view="profile">Profile</div>
    <div class="bg-dark text-white _prof text-center _prof_right" data-view="edit">Edit</div>
  </div>
  
          

</div>
      
    </div>

<!-- YOUR PROFILE -->
<?php
  $sql = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0 ){
    $out = array();
    while ($row = mysqli_fetch_assoc($result)){
      $out[$row['name']] = $row;
    
      foreach ($out as $item){
        ?>
    <div class="row _flag_prof" data-view="profile">
      <div class="col-4 text-center">
        <?php if(isset($row['image'])) {echo "<img class='p-4' src='images/users/" . $row['image'] . "' width='80%'><h2 class='text-center'>" . $login . "</h2>";} else {echo "<h2 class='text-center pt-5'>" . $login . "</h2><h6 class='text-center pt-5'>Аватарка не добавлена, в меню редактирования вы сможете это исправить.</h6>";} ?>
      </div>
      <div class="col-3">
        <form>
          <?php if (isset($row['name'])){?>
          <dl>
            <dt>
              <label>Name</label>
            </dt>
            <dd>
              <div class="__name"><?php echo $item['name'];?></div>
            </dd>
          </dl>
            <?php } ?>
            <?php if (isset($row['surname'])){?>
          <dl>
            <dt>
              <label>Surname</label>
            </dt>
            <dd>
              <div class="__surname"><?php echo $item['surname'];?></div>
            </dd>
          </dl>
          <?php } ?>
          <?php if (isset($row['bio'])){?>
          <dl>
            <dt>
              <label>Bio</label>
            </dt>
            <dd>
              <div class="__bio"><?php echo $item['bio'];?></div>
            </dd>
          </dl>
          <?php } ?>
          <?php if (isset($row['phone'])){?>
          <dl>
            <dt>
              <label>Phone</label>
            </dt>
            <dd>
              <div class="__phone"><?php echo $item['phone'];?></div>
            </dd>
          </dl>
          <?php } ?>
          <?php if (isset($row['location'])){?>
          <dl>
            <dt>
              <label>Location</label>
            </dt>
            <dd>
              <div class="__location"><?php echo $item['location'];?></div>
            </dd>
          </dl>
          <?php } ?>
        </form>
      </div>

      <div class="col-5">
        <div class="avatar-upload">
          <h2>Сделанные заказы:</h2>
              <?php 
                // $stat = $dbh->prepare("SELECT * FROM users");
                // $stat->execute();
                // while ($row = $stat->fetch()){
                //   // echo "<h5>".$row['image']."</h5>
                //   echo "<embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='200px'>";
                // }
                
        
              ?>
        </div>
      </div>
    </div>
    <!-- EDIT PROFILE -->
    <div class="row _flag_prof d-none" data-view="edit">
      <div class="col-4">        
        <div class="avatar-upload text-center">
          <?php if(isset($row['image'])) {echo "<img class='p-4' src='images/users/" . $row['image'] . "' width='80%'><h2 class='text-center'>" . $login . "</h2>";} else {echo "<h2 class='text-center pt-5'>" . $login . "</h2><h6 class='text-center pt-5'>Аватарка не добавлена, нажмите на кнопку 'Upload image' для того, чтобы загрузить ее.</h6>";} ?>

          <form action="profile" method="POST" enctype="multipart/form-data">
            <p class="text-center">
              <input type="file" name="image">
              <input type="submit" class="btn btn-success" name="upload" value="Upload Image">
            </p>
          </form>

        </div>
      </div>
      <div class="col-3">
        <form action="profile" method="POST">
          <dl>
            <dt>
              <label>Name</label>
            </dt>
            <dd>
              <input type="text" name="name" value="<?php if (isset($row['name'])){ echo $item['name'];}?>">
            </dd>
          </dl>
            <dt>
              <label>Surname</label>
            </dt>
            <dd>
              <input type="text" name="surname" value="<?php if (isset($row['name'])){ echo $item['surname'];}?>">
            </dd>
          <dl>
            <dt>
              <label>Bio</label>
            </dt>
            <dd>
              <textarea type="text" name="bio"><?php if (isset($row['name'])){ echo $item['bio'];}?></textarea>
            </dd>
          </dl>
          <dl>
            <dt>
              <label>Phone</label>
            </dt>
            <dd>
              <input type="text" name="phone" value="<?php if (isset($row['name'])){ echo $item['phone'];}?>">
            </dd>
          </dl>
          <dl>
            <dt>
              <label>Location</label>
            </dt>
            <dd>
              <input type="text" name="location" value="<?php if (isset($row['name'])){ echo $item['location'];}?>">
            </dd>
          </dl>
          <dl>
            <dd>
              <input class="btn btn-success" type="submit" value="Update" name="update">
            </dd>
          </dl>
        </form>
      </div>

      <div class="col-5">

      </div>
    </div>
    <?php 
            }
          }
        }
        
          ?>
    
  </div>
</div>
</div>