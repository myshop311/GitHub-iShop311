<?php 
if(strpos($_SERVER["SCRIPT_NAME"], "ishop311/") and strpos($_SERVER["SCRIPT_NAME"], "ishop311/") >0){

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "ishop311";
 
}

else{
$servername = "mysql17.ezhostingserver.com";
$db_username = "ishop";
$db_password = "Is345345";
$dbname = "mysql311";

}
/*
echo $servername;
echo $db_username;
echo $db_password;
echo  $dbname;*/


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
