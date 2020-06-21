<?php

include 'inc/config.php';

$username = $email =  $errorMessage = '';

$errors = array('username' => '', 'email' => '' );


if(isset($_POST['submit'])){

  setcookie('usernameCookie', $_POST['username'], time() + 5000 );


  if(empty($_POST['username']) || strlen($_POST['username']) <= 3 ){
    $errors['username'] = "Ime mora vsebovati vsaj 3 znake";
  } else{
    $username = $_POST['username'];
    if(! preg_match('/^[a-zA-Z\s]+$/' ,$username)){
      $errors['username'] = "Ime lahko vsebuje samo črke in presledke";
    }
  }


  if(empty($_POST['email'])){
    $errors['email'] = "email je obvezen podatek";
  } else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "email ni veljaven";
    }
  }


  if(!array_filter($errors)){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    $sql = "INSERT INTO users(name,email)
    VALUES('$username', '$email')";

    if(mysqli_query($connect,$sql)){
      header('Location: index.php');
      exit;
    }else{
      echo "Query error: ".mysqli_error($connect);
    }
  }

}

?>


<?php include 'inc/headNav.php'; ?>



<div class="container">
  <div class="slim">
    <img src="img/logo/logo.png" class="img-fluid round" alt="login_logo">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="indent">
        <div class="spacing">
          <span class="glyphicon glyphicon-user sqr"></span>
          <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
          <p style="color:#ff030e"><?php echo $errors['username']; ?></p>
        </div>
        <div class="spacing">
          <span class="glyphicon glyphicon-envelope sqr"></span>
          <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
          <p style="color:#ff030e"><?php echo $errors['email']; ?></p>
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
