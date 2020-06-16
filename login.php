<?php

$username = $_POST['username'] ?? 'Login';

if(isset($_POST['submit'])){

$isMember = $username == 'mem';

if($isMember){
  echo "Loggedin";
}

}


 ?>





<?php include 'inc/headNav.php'; ?>

<div class="container">
  <div class="slim">
    <img src="img/logo.png" class="round" width="250px"  alt="login_logo">
    <form class="slimForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="indent">
      <br>
      <span class="glyphicon glyphicon-user sqr"></span>
          <input type="text" name="username" value="">
      <br>
      <input type="submit" name="submit" value="LOGIN" class="btn btn-lg btn-danger">
    </div>
    </form>
  </div>
</div>

<div class="container below">
  <p>test</p>

  <p>

  <?php echo htmlspecialchars($username); ?></p>
</div>
