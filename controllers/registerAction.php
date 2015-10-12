
<?php
if (isset($_POST["registerSubmit"])){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
	
    $age = $_POST["age"];
    $email = $_POST["email"];
    $password = $_POST["password"];
//to protect MySQL injection
$email     = stripslashes($email);
$password  = stripslashes($password);

  $return = '';
  //@return='';
 
$result = $conn->query("call sp_CustomersInsert( $age,'$firstName', '$lastName', '$email', '$password', @return)"); 

$meg = "";
    foreach($result as $row)
    {
		$meg =$row["meg"]; 
	}
	//echo $meg ;	
 if(!strpos($meg,'existed')>0){
	$reg =1; }
else{
	 $reg =0;
}	
  $conn = null;
}
?>







