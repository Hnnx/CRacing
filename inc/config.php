<?php

$connect = mysqli_connect('localhost','CRDBadmin','crdbadmin123','cracing');

if(!$connect){
  echo "Connection error: ".mysqli_connect_error($connect);
}


 ?>
