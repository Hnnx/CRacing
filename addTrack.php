<?php
include 'inc/headNav.php';
include 'inc/config.php';


$sqlStatement = 'SELECT * FROM tracks ORDER BY created_at';
$sqlResult = mysqli_query($connect, $sqlStatement);
$tracks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

mysqli_free_result($sqlResult);
mysqli_close($connect);


 ?>


 <?php
 printr($tracks);
 ?>

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



<?php $title = ' Footer';
include 'inc/title.php';
include 'inc/footer.php' ?>
