
<?php


if (isset($_POST["loginSubmit"])){

$_SESSION["reg"]==0;
$_SESSION["loginName"]="";
    $email = $_POST["email"];
    $password = $_POST["password"];

//to protect MySQL injection
$email     = stripslashes($email);
$password  = stripslashes($password);

$sql = "SELECT count(id) as count1 FROM Customers where email='$email' and password='$password'";

$result = $conn->query($sql); 
  
	$recordFound =$result; 
	 
  $conn = null;
  
}

if ($recordFound ==1){ 
$_SESSION["loginName"]=$email; 
//echo $_SESSION["loginName"];
}
 


?>







