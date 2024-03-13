<?php
class InsertForm
{
    function __construct()
    {
        $dbHost = "localhost";
        $dbName = "db_app";
        $dbUser = "root";      //by default root is user name.  
        $dbPassword = "";

        $this->database = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        date_default_timezone_set('Asia/Tehran');
    }
    function insertForm($text)
    {
        
        $sql = 'INSERT INTO table_data (text) value (?) ';
        $allData = $this->database->prepare($sql);
        $allData->bindValue(1,  $text);

        $allData->execute();
        header('location: http://localhost/app/');

    }

    function selectForm()
    {
        $sql = 'SELECT * FROM table_data ';
        $allData = $this->database->prepare($sql);
        $allData->execute();
        $result = $allData->fetchAll();
        return $result;                            
    }

    function updateForm($text,$id){
        $sql = 'UPDATE table_data SET text=? WHERE id=? ';
        $allData = $this->database->prepare($sql);
        $allData->bindValue(1, $text);
        $allData->bindValue(2, $id);
        $allData->execute();

        header('location: http://localhost/app/');

    }

    function deleteForm($delete){
        $x = join(',', $delete);
        $sql = "delete  from table_data where id IN (" . $x . ")";
        $allData = $this->database->prepare($sql);
        $allData->execute();
        header('location: http://localhost/app/');

    }

   
    
 
}
$result = new InsertForm;
if(isset($_POST['text'])){
    $text = $_POST['text'];
    $result->insertForm($text);
}

if(isset($_POST['text1']) & isset($_GET['id'])){
    $text = $_POST['text1'];
    $id = $_GET['id'];
    $result->updateForm($text,$id);
}

if(isset($_POST['delete'])){
    $delete = $_POST['delete'];
    $result->deleteForm($delete);
}


