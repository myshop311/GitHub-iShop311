
<?php

$error=0;

$firstNameErr = "";
$lastNameErr = "";
$ageErr="";
$emailErr = "";
$passwordErr = "";
  
  
function val_input($dat) {
   $dat = trim($dat);
   $dat = stripslashes($dat);
   $dat = htmlspecialchars($dat);
   return $dat;
}


if (isset($_POST["registerSubmit"])){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
	
    $age = $_POST["age"];
    $email = $_POST["email"];
    $password = $_POST["password"];   
	 
  if (empty($_POST["firstName"])) {
    $firstNameErr = "First Name is required"; 
$error=1; 
  } else {
    $firstName= val_input($_POST["firstName"]);
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "Last Name is required";
	$error=1; 
  } else {
    $lastName = val_input($_POST["lastName"]);
  }
  
  if (filter_var($age, FILTER_VALIDATE_INT) === 0 || !filter_var($age, FILTER_VALIDATE_INT) === false) {
} else {
    $ageErr = $ageErr . "Age is not valid.";
}


  if (empty($_POST["age"])) {
    $ageErr =  $ageErr . "Age is required";
	$error=1; 
  } else {
    $age = val_input($_POST["age"]);
  }




  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
	$error=1; 
  } else {
    $age = val_input($_POST["age"]);
  }
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$error=1; 
  } else {
    $email = val_input($_POST["email"]);
  }
  

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
	$error=1; 
  } else {
    $password = val_input($_POST["password"]);
  }
      
	  
}

?> 
 






