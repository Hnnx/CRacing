<?php

include 'inc/config.php';

#show tracks
$sqlStatement = "SELECT * FROM tracks ORDER BY created_at";
$sqlResult = mysqli_query($connect,$sqlStatement);
$tracks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);


?>

<div class="container" id="routes">
  <div class="row">
    <?php foreach ($tracks as $track): ?>
    <div class="col-lg-4">
        <div class="card blackbg" href="./trackDetail.php?id=<?php echo $track['id']?>" style="width: 25rem;">
          <img src="img/logo/logo.png" class="card-img-top rounded border border-white opaque img-fluid" alt="trackPic">
          <div class="card-body cardSpacing">
            <h5 class="card-title trackTitle"> <a style="color:white" href="trackDetail.php?id=<?php echo $track['id']; ?>"> <?php echo htmlspecialchars($track['title']); ?></a> </h5>
            <p class="card-text desc"><?php echo htmlspecialchars($track['description']); ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>
