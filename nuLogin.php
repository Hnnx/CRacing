<?php
include 'inc/headNav.php';
include 'inc/config.php';

?>


<?php

//Define empty vars
$regUsername = $regPass = $regPassConfirm = '';
$regErrors = array('regUsername' => '' ,'regPass' => '', 'regPassConfirm' => '' );

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  #Username Validation
  if(empty(trim($_POST['regUsername']))){
    $regErrors['regUsername'] = 'username cannot be blank :(';
  } else{

    #Prepared statement (? is replaced with  idsb  (int, double, string, blob))
    $sqlPrep = "SELECT id FROM users WHERE username = ?";

    if($stmt = mysqli_prepare($connect, $sqlPrep)){
      #BIND
      mysqli_stmt_bind_param($stmt, "s", $paramUsername);

      #SET PARAMETER
      $paramUsername = trim($_POST['regUsername']);

      #EXECUTING PREPARED STATEMENT
      if(mysqli_stmt_execute($stmt)){
        //STORE RESULT
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
          $regErrors['regUsername'] = "Cool name. Someone took it already :(";
        } else{
          $regUsername = $_POST['regUsername'];
        }
      } else{
        echo "Unknown error - please report to web admin";
      }

      mysqli_stmt_close($stmt);

    }
  }#END USERNAME VALIDATION


  #VALIDATE PASSWORD
  if(empty(trim($_POST['regPass']))){
    $regErrors['regPass'] = "Password cannot be blank :(";
  }
  elseif( strlen(trim($_POST['regPass'])) < 8 ) {
    $regErrors['regPassConfirm'] = "Password should have 8 characters";
  } else{
    $regPassConfirm = trim($_POST['regPassConfirm']);
  }


  #VALIDATE PASS CONFIRMATION
  if(empty(trim($_POST['regPass']))){
    $regErrors['regPass'] = "Please confirm password";
  } else {
    if( array_filter($regErrors) && ($regPass != $regPassConfirm) ){
      $regErrors['regPassConfirm'] = "Passwords do not match! D:";
    }
  }


  #CHECK FOR ERRORS BEFORE INSERTING

  if(!array_filter($regErrors)){

    $sql = "INSERT INTO users ( username, password)
            VALUES( ?, ?)";

    if($stmt = mysqli_prepare($connect,$sql)){
      mysqli_stmt_bind_param($stmt, "ss", $paramUsername, $paramPassword);

      #Set params  + hash
      $paramUsername = $regUsername;
      $paramPassword = password_hash($regPass, PASSWORD_DEFAULT);


      #Exec statement
      if(mysqli_stmt_execute($stmt)){
        header('location: index.php');
      } else{
        echo "Something's wrong :( contact web admin";
      }
        mysqli_stmt_close($stmt);
    }

  }#END ERROR CHECK

  mysqli_close($connect);

}#END POST CHECK

?>

<div class="container whitebg">

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="regUsername" class="form-control" value="<?php echo htmlspecialchars($regUsername); ?>">
      <span class="help-block"> <?php echo $regErrors['regUsername']; ?></span>
    </div>


    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="regPass" class="form-control" value="<?php echo htmlentities($regPass); ?>" >
      <span class="help-block"> <?php echo $regErrors['regPass']; ?> </span>
    </div>

    <div class="form-group">
      <label for="passwordConfirm">Confirm Password</label>
      <input type="password" name="regPassConfirm" class="form-control" value="<?php echo htmlentities($regPassConfirm); ?>">
      <span class="help-block"> <?php echo $regErrors['regPassConfirm']; ?></span>
    </div>

    <div class="form-group">
      <input type="submit" name="Submit" class="btn btn-lg btn-danger" value="Submit">
      <input type="reset" name="Submit" class="btn btn-lg btn-default" value="Reset">
    </div>

    <p style="font-family: 'Nunito Sans', sans-serif;">Already a member? <a href="login.php" style="color:black">Log in here</a></p>

  </form>

</div>

<?php
include 'inc/footer.php';
?>
