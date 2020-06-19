<?php
include 'inc/headNav.php';
include 'inc/config.php';

$trackTitle = $trackDescription = $trackDifficulty = $trackLocation = '';

$errors = array('title' => '', 'description' => '', 'difficulty' => '', 'location' => '');


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
    $errors['description'] = "Lokacija mora vsebovati vsaj 3 črke";
  } else{
    $trackLocation = $_POST['trackLocation'];
  }

}



$sqlStatement = 'SELECT * FROM tracks ORDER BY created_at';
$sqlResult = mysqli_query($connect, $sqlStatement);
$tracks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

mysqli_free_result($sqlResult);
mysqli_close($connect);


 ?>




<div class="container whitebg">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Naslov: <input type="text" name="trackTitle" value=""> <br>
    Opis: <input type="text" name="trackDescription" value=""> <br>
    Tip: <select class="" name="trackDifficulty">
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
    </select><br>

    Lokacija: <input type="text" name="trackLocation" value=""><br>

    <input type="submit" name="submit" value="Dodaj">
  </form>
</div>

<div class="container whitebg">
  aaaaaaaa
  <p>
    <?php echo $trackTitle; ?>
    <?php echo $trackDescription; ?>
    <?php echo $trackDifficulty; ?>
    <?php echo $trackLocation; ?>

  </p>

</div>
<!--
<div class="container">
  <ul>
    <?php foreach ($tracks as $track): ?>
      <li> <?php echo $track['title']; ?> </li>
    <?php endforeach; ?>
  </ul>

  <p>Opisi:</p>
  <ul>
    <?php foreach ($tracks as $tracks): ?>
      <li> <?php echo $tracks['description']; ?> </li>
    <?php endforeach; ?>
  </ul>
</div>
-->

<?php $title = ' Footer';
include 'inc/title.php';
include 'inc/footer.php'; ?>
