<?php 

session_start();  

if(!isset($_SESSION["pgtype"])){
$_SESSION["pgtype"] ='normal';
}
 
if(isset($_GET["pgtype"])){
	$_SESSION["pgtype"] =$_GET["pgtype"];
}
 
?>
