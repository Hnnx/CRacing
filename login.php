<?php

$username = $errorMessage = '';

if(isset($_POST['submit'])){

  setcookie('usernameCookie', $_POST['username'], time() + 86400 );


  if(checkName($_POST['username'])){
    $username = $_POST['username'];
    $errorMessage = '';
    header("Location: index.php");
  }
  else{
  $errorMessage = "Username shoud be between 3 and 13 chars";
  }
}

function checkName($un){
  if(strlen($un) >= 3 && strlen($un) <= 13)
  return true;
}
?>



<?php include 'inc/headNav.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/master.css" type="text/css" >
  </head>
  <body>

  </body>
</html>


<div class="container">
  <div class="slim">
    <img src="img/logo.png" class="round" alt="login_logo">
    <form class="slimForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="indent">
        <div class="spacing">
         <span class="glyphicon glyphicon-user sqr"></span>
        <input type="text" name="username" value="">
        <p style="color:#ff030e"><?php echo $errorMessage; ?></p>
        </div>
        <div class="spacing">
         <span class="glyphicon glyphicon-remove sqrg"></span>
        <input type="text" class="pwDisable" name="password" value="" placeholder="password disabled" readonly>
        <p style="color:#ff030e"><?php echo $errorMessage; ?></p>
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn btn-lg btn-danger">
      </div>
    </form>
  </div>
</div>


<?php $title = ' footer';
    include 'inc/title.php';

include 'inc/footer.php'; ?>
