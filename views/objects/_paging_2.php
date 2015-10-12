<?php 


$sql = "select count(*) as caseCount  from customers";
 
if($fields[0]<>''){
	$sql = $sql ." where CONCAT(firstName, ' ' , lastName, ' ' , email) like '%$fields[0]%' ";
	}
if($fields[1]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[1]%' ";
}
if($fields[2]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[2]%' ";
} 

 
$result = $conn->query($sql);
$totRow=0;
    foreach($result as $row){
		$totRow = $row["caseCount"];
		//echo $row["caseCount"];
	}
	  

require '_paging_cal_2.php';


$j = ceil($totRow/$maxRow);


  $startRow = ($pageid -1) * $maxRow +1;
 

$sql = "select count(*) as count1  from customers";
 
if($fields[0]<>''){
	$sql = $sql ." where CONCAT(firstName, ' ' , lastName, ' ' , email) like '%$fields[0]%' ";
	}
if($fields[1]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[1]%' ";
}
if($fields[2]<>''){
$sql = $sql ." or CONCAT(firstName, ' ' , lastName, ' ' , email)  like '%$fields[2]%' ";
} 



$result = $conn->query($sql);

$count_1 = 0;

    foreach($result as $row)
    {  $count_1 = $count_1 +1;
	} 
    

 if(isset($_SESSION["pgtype"])) {
if($_SESSION["pgtype"]=='normal'){
	$width_a=400;
} 
else{
	$width_a="";
}
 }

$loopcount = 1 ;

	$nextDisabled =0;  
	 
	$pagestartid =$pageid -4;
	
	if($pagestartid<0) 
		$pagestartid =1;
	
	
	$startRo = ($pageid -1) *$maxRow +1; 
	
	$endRo = $startRo + $maxRow -1;  
	
	if ($endRo > $totRow ) {
	$endRo = $totRow;}
	
	
	
	
	
if($totRow>0){
echo "<table align='center' width='$width_a'><tr><td align='right'> $startRo - $endRo of $totRow records";  
echo "</td></tr></table>"; 
}

 
  
?>
