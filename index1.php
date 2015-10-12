<!doctype html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iDemo311.com</title>
<link rel="stylesheet" href="css/style.css">

<body>
<header>
<div>
  <?php 

 include 'views/objects/_pg_set.php'; 
 
 
if(isset($_SESSION["pgtype"]) && $_SESSION["pgtype"]=='normal'){
 include 'head.html'; 
 include 'nav.php'; 
 }
 else{ 
 include 'headm.html'; 
 include 'navm.html';  
 }
 include 'views/objects/_db_set.php'; 
 
 ?>
  <p align="center">
    <?php
//echo  $_SESSION["loginName"];
$pagelist= array("login", "myaccount", "contactus",  "aboutus","logout",  "register","examples",  "examples2","exampPdf");
$pagepass=0;
$page ="";
 if(isset($_GET["page"]))
 {
	 $page=$_GET["page"];
 }
 

for($i=0;$i<sizeof($pagelist);$i++){
	if($pagelist[$i]==$page){
		$pagepass=1;
	} 
}

 if(isset($_GET["page"]) && $_GET["page"] <> 'logout'){  
if (isset($_SESSION["loginName"]) && !$_SESSION["loginName"]=="" ){
	echo "Hello ". $_SESSION["loginName"] ."<br>";
}
 }
 
 $pagename= '';
 
 if($pagepass ==1){ 
 if(isset($_GET["page"])){
 $pagename= 'views/' . $_GET["page"] . '.php';
 }
}


 //echo  $pagename;
 if ($pagename <> '')
 include $pagename; 
else
echo 'Welcome to iDemo311.com';
?>
  </p>
</div>
</body>
</html>