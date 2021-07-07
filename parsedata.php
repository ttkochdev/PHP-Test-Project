<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "db.php";
 
//create array of mysql data
$sql = $conn->prepare("SELECT * FROM sweetwater_test");
$sql->execute();

/* Fetch all of the remaining rows in the result set */
print("Fetch all of the remaining rows in the result set:\n");
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
//print_r($result);

function parseCandy($result){
    foreach($result as $value ){
        //has candy 
        if(strpos($value['comments'], 'candy')){
            echo $value['orderid']. " ". $value['comments']."<br>";
        }
    }
    //return array with comments about candy
}

parseCandy($result);
?>