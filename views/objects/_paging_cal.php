<?php 

$next=0;
$prev=0;

if(!isset($_SESSION["maxRow"])){
$maxRow =5;
}
else{
	$maxRow =$_SESSION["maxRow"]; 
} 

if(isset($_GET["pageid"])){
$pageid=$_GET["pageid"];
}
else{ 
$pageid = 1;
} 

 

 if(isset($_GET["next"])){
	$next= filter_var($_GET["next"], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
}

 if(isset($_GET["prev"])){
	$prev= filter_var($_GET["prev"], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
}
	 
 if(isset($_GET["maxRow"])){
	$maxRow= filter_var($_GET["maxRow"], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
	$_SESSION["maxRow"] = $maxRow;
}
 
 
 
if($next==1){ 
$pageid = $pageid + 1; 
}
if($prev==1){ 
$pageid = $pageid - 1;
}


if($pageid <=0){ 
$pageid= 1;
} 

?>
