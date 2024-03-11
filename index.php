<?php
  $dbHost = "localhost";
  $dbName = "db_app";
  $dbUser = "root";      //by default root is user name.  
  $dbPassword = "";

  $database = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
  date_default_timezone_set('Asia/Tehran');
 
  ?>

  <form action="" method="POST">
<input type="text" name="text">
<button>
                افزودن                </button>
  </form>
  <?php
   if(isset($_POST['text'])){
    $text = $_POST['text'];
  

 $sql = 'INSERT INTO table_data (text) value (?) ';
 $allData = $database->prepare($sql);
 $allData->bindValue(1,  $text);

 $allData->execute();


 $sql2 = 'SELECT * FROM table_data ';
 $allData2 = $database->prepare($sql2);
 $allData2->execute();
foreach ($allData2 as $value) {
  echo $value['text'];
} }
  ?>
