<?php
include 'inc/headNav.php';
?>


<div class="container whitebg">

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input class="form-control-lg" type="text" name="loginUsername" placeholder="username"><br>
      <label for="password">Password</label>
      <input type="password" name="loginpassword" placeholder="password"><br>
      <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Submit">
    </div>
  </form>
  <a href="signup.php" class="btn btn-lg btn-primary">Signup</a>
  <div class="spacer">

  </div>

</div>


<?php
include 'inc/footer.php';
?>
