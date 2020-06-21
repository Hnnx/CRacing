
 <?php

 define('DB_SERVER','localhost');
 define('DB_USERNAME','CRDBadmin');
 define('DB_PASSWORD','crdbadmin123');
 define('DB_NAME','cracing');

 $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

 if(!$connect){
   echo "Connection error: ".mysqli_connect_error($connect);
 }

  ?>
