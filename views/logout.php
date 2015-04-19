<?php

if (isset($_SESSION["loginName"])){
	session_unset(); 
session_destroy();
}
echo "<p align='center'>You just logged out.</p>";
 
?>
