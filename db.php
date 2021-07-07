<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "sweetwater_test";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}

function fetchALLResults($conn){
    //create array of mysql data
    $sql = $conn->prepare("SELECT * FROM sweetwater_test");
    $sql->execute();

    /* Fetch all of the remaining rows in the result set */
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
function countALLResults($conn){
    //create array of mysql data
    $sql = $conn->prepare("SELECT * FROM sweetwater_test");
    $sql->execute();

    /* Fetch all of the remaining rows in the result set */
    $result = $sql->rowCount();
return $result;
}



?>