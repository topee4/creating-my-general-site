<?php 
$msg = "";
require 'profile_core/db.php';
$conn = connect();
if (isset($_POST['upload'])){
$target = "images/users/".basename($_FILES['image']['name']);

$image = $_FILES['image']['name'];


$sql = "INSERT INTO users (image) VALUES ('$image')";
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
    <div class="card-header">Profile</div>
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
        <form>
          <dl>
            <dt>
              <label>Name</label>
            </dt>
            <dd>
              <input type="text">
            </dd>
          </dl>
            <dt>
              <label>Surname</label>
            </dt>
            <dd>
              <input type="text">
            </dd>
          <dl>
            <dt>
              <label>Bio</label>
            </dt>
            <dd>
              <textarea type="text"></textarea>
            </dd>
          </dl>
          <dl>
            <dt>
              <label>Phone</label>
            </dt>
            <dd>
              <input type="text">
            </dd>
          </dl>
          <dl>
            <dt>
              <label>Location</label>
            </dt>
            <dd>
              <input type="text">
            </dd>
          </dl>
        </form>
      </div>

      <div class="col-3">
        <div class="avatar-upload">
          <div>
            <p>
              <?php 
                // $stat = $dbh->prepare("SELECT * FROM users");
                // $stat->execute();
                // while ($row = $stat->fetch()){
                //   // echo "<h5>".$row['image']."</h5>
                //   echo "<embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='200px'>";
                // }
                $sql = "SELECT image FROM users";
                $result = mysqli_query($conn, $sql);
                $row = "";
                while($row = mysqli_fetch_assoc($result)) {
                  if(isset($row['image'])) {echo "<img src='images/users/" . $row['image'] . "' width='200px'>";}
                }
              ?>
            </p>
          </div>
          <form action="profile" method="POST" enctype="multipart/form-data">
            <p>
              <input type="file" name="image">
              <input type="submit" name="upload" value="Upload Image">
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>