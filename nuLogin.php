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
  if(empty(trim($_POST['$regUsername']))){
    $regErrors['regUsername'] = 'username cannot be blank :(';
  } else{

    #Prepared statement (? is replaced with  idsb  (int, double, string, blob))
    $sqlPrep = "SELECT id FROM users WHERE username = ?";

    if($stmt = mysqli_prepare($connect, $sqlPrep)){
      #BIND
      mysqli_stmt_bind_param($sqlPrep, "s", $paramUsername);

      #SET PARAMETER
      $paramUsername = trim($_POST['regUsername']);

      #EXECUTING PREPARED STATEMENT
      if(mysqli_stmt_execute($sqlPrep)){
        //STORE RESULT
        mysqli_stmt_store_result($sqlPrep);

        if(mysqli_stmt_num_rows($sqlPrep) == 1){
          $regErrors['regUsername'] = "Cool name. Someone took it already :(";
        } else{
          $regUsername = $_POST['regUsername'];
        }
      } else{
        echo "Unknown error - please report to web admin";
      }

      mysqli_stmt_close($sqlPrep);

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
    if( !array_filter($regErrors) && ($regPass != $regPassConfirm) ){
        $regErrors['regPassConfirm'] = "Passwords do not match! D:";

  }







}#END POST CHECK


 ?>



<?php
include 'inc/footer.php';
?>
