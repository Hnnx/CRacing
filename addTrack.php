<?php
ob_start();
include 'inc/headNav.php';
include 'inc/config.php';




$trackTitle = $trackDescription = $trackDifficulty = $trackLocation = '';

$errors = array('title' => '', 'description' => '', 'difficulty' => '', 'location' => '');

#SHOW SQL
$sqlStatement = 'SELECT * FROM tracks ORDER BY created_at';
$sqlResult = mysqli_query($connect, $sqlStatement);
$tracks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);


if(isset($_POST['submit'])){

  if(empty($_POST['trackTitle']) || strlen($_POST['trackTitle']) <= 3 ){
    $errors['title'] = "Naslov mora vsebovati vsaj 3 črke";
  } else{
    $trackTitle = $_POST['trackTitle'];
    if(! preg_match('/^[a-zA-Z\s]+$/' ,$trackTitle)){
      $errors['title'] = "Naslov lahko vsebuje samo črke in presledke";
    }
  }


  if(empty($_POST['trackDescription']) || strlen($_POST['trackDescription']) <= 3 ){
    $errors['description'] = "Opis mora vsebovati vsaj 3 črke";
  } else{
    $trackDescription = $_POST['trackDescription'];

  }

  if(empty($_POST['trackLocation']) || strlen($_POST['trackLocation']) <= 3){
    $errors['location'] = "Lokacija mora vsebovati vsaj 3 črke";
  } else{
    $trackLocation = $_POST['trackLocation'];
  }


  if(!array_filter($errors)){

    $trackTitle = mysqli_real_escape_string($connect, $_POST['trackTitle']);
    $trackDescription = mysqli_real_escape_string($connect, $_POST['trackDescription']);
    $trackDifficulty = mysqli_real_escape_string($connect, $_POST['trackDifficulty']);
    $trackLocation = mysqli_real_escape_string($connect, $_POST['trackLocation']);

    //create SQL

    $sql = "INSERT INTO tracks(title,description,dif,location)
    VALUES('$trackTitle','$trackDescription','$trackDifficulty','$trackLocation')";

    //save to DB and check
    if(mysqli_query($connect,$sql)){
      header('Location: index.php#routes');
      exit;
    } else{
      echo "Query error " . mysqli_error($connect);
    }
  }

}

ob_end_flush();
?>




<div class="container">
  <div class="slim">
    <img src="img/logo/logo.png" class="img-fluid round" alt="login_logo">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="indent">
        <div class="spacing">
          <input type="text"  class="form-control" name="trackTitle" placeholder="NASLOV" value="<?php echo htmlspecialchars($trackTitle); ?>">
          <p class="formError"> <?php echo $errors['title']; ?> </p>
        </div>
        <div class="spacing">
          <input type="text" name="trackDescription" class="form-control" placeholder="OPIS" value="<?php echo htmlspecialchars($trackDescription); ?>">
          <p class="formError"> <?php echo $errors['description']; ?> </p>
        </div>
        <div class="spacing">
          <input type="text" name="trackLocation" class="form-control" placeholder="LOKACIJA" value="<?php echo htmlspecialchars($trackLocation); ?>">
          <p class="formError"> <?php echo $errors['location']; ?> </p>
        </div>

        <div class="spacing">

          <select class="form-control form-control-lg" name="trackDifficulty">
            <option value="1">Panorama</option>
            <option value="2">Rush</option>
            <option value="3">Racing</option>
            <option value="4">City</option>
            <option value="5">Group</option>
            <option value="6">Novice</option>
            <option value="7">Hillclimb</option>
            <option value="8">Curves</option>
            <option value="9">Tarmac</option>
            <option value="10">Gravel</option>
          </select> <br>
        </div>

        <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Dodaj">
      </div>
    </form>
  </div>
</div>



<?php $title = ' Footer';
include 'inc/title.php';
include 'inc/footer.php'; ?>
