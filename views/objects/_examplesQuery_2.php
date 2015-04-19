<?php
 
 $startRow = ($pageid -1) * $maxRow +1;
  $RowOffset = $startRow -1;
  
  if(isset($_POST["searchTxt"])){ //echo 'post' . $_POST["searchTxt"];
	  $searchTxt=$_POST["searchTxt"];
  }
  
 
$sql = "select firstName, lastName, age , email from customers";
if($fields[0]<>''){
	$sql = $sql ." where CONCAT(firstName, ' ' , lastName, ' ' , email) like '%$fields[0]%' ";
	}
if($fields[1]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[1]%' ";
}
if($fields[2]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[2]%' ";
}
//$sql = $sql ." order by $so $soTypeText LIMIT $maxRow OFFSET $RowOffset ";

$result = $conn->query($sql);
?>