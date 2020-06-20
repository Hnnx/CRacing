<?php

ob_start();
include 'inc/headNav.php';
include 'inc/config.php';


if(isset($_POST['remove'])){

  $id_remove = mysqli_real_escape_string($connect, $_POST['id_remove']);

  $sql = "DELETE FROM tracks WHERE id = $id_remove";

  if(mysqli_query($connect, $sql)){
    header('Location: index.php#routes');

  }else {
    echo "Query error: ".mysqli_error($connect);
  }

}


  if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM tracks WHERE id = $id";

    $sqlResult = mysqli_query($connect,$sql);

    $track = mysqli_fetch_assoc($sqlResult);

    mysqli_free_result($sqlResult);
    mysqli_close($connect);

  }



ob_end_flush();
 ?>

 <div class="container">
   <?php if($track): ?>

   <h3><?php echo htmlspecialchars($track['title']); ?></h3>
   <p>Created at: <?php echo $track['created_at']; ?></p>
   <p>Opis: <?php echo htmlspecialchars($track['description']); ?></p>


   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <input type="hidden" name="id_remove" value="<?php echo $track['id']; ?>">
     <input type="submit" name="remove" value="delete" class="btn btn-primary" >
   </form>

 <?php else: ?>

   <h3>Track not found :(</h3>

 <?php endif; ?>

 </div>
