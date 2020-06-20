<?php

include 'inc/config.php';

#show tracks
$sqlStatement = "SELECT * FROM tracks ORDER BY created_at";
$sqlResult = mysqli_query($connect,$sqlStatement);
$tracks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);


?>

<div class="container">
  <div class="row">
    <?php foreach ($tracks as $track): ?>
    <div class="col-lg-2">
        <div class="card blackbg" style="width: 18rem;">
          <img src="img/ant2.png" class="card-img-top rounded border border-white opaque" alt="...">
          <div class="card-body cardSpacing">
            <h5 class="card-title trackTitle"><?php echo htmlspecialchars($track['title']); ?> </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>


  <div class="">

  </div>


</div>
