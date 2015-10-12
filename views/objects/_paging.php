

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
	  

require '_paging_cal.php';


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



echo "<table align='center'><tr><td>"; 

if ($pageid > 1){ 
echo "<a href='?page=examples&pageid=$pageid&prev=1&searchTxt=$searchTxt'><u>Prev</u> |</a>"; 
}
else{  
echo "Prev |";
}
if($pageid >= $j){
	$nextDisabled =1;
}
 if ($pagestartid <=0){
	$pagestartid =1; 
 }
for($i=$pagestartid;$i<= $j; $i++){ 
if($loopcount<=5){   
if ($pageid <> $i){
echo "<a href='?page=examples&pageid=$i&searchTxt=$searchTxt'><u> $i</u> |</a>";
}
else{ 
echo " $i |";
}
} 
$loopcount = $loopcount+1 ;

}   
if ($nextDisabled ==0){
echo "<a href='?page=examples&pageid=$pageid&next=1&searchTxt=$searchTxt'><u>Next</u></a> ";
}
else{  
echo "Next ";
}
 
if ($maxRow <> 2){
echo "Max Rows: <a href='?page=examples&maxRow=2&searchTxt=$searchTxt'>[2]</a>"; 
}
else{ 
echo "Max Rows: [2]";
}


if ($maxRow <> 5){
echo "<a href='?page=examples&maxRow=5&searchTxt=$searchTxt'>[5]</a>"; 
}
else{ 
echo "[5]";
}



if ($maxRow <> 10){
echo "<a href='?page=examples&maxRow=10&searchTxt=$searchTxt'>[10]</a>"; 
}
else{ 
echo "[10]";
}
 
echo "</td></tr></table>"; 
?>














