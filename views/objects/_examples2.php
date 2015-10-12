<?php 
$so = 1; 
$searchTxt = $_REQUEST["searchTxt"];
$width_a="";
$soTypeText="";
$soType=1;
$pageName="examples";
if(isset($_GET["so"])){
	if (!filter_var($_GET["so"], FILTER_VALIDATE_INT) === false && $_GET["so"] <=3 && $_GET["so"] > 0){
	$so= $_GET["so"];
	}  
}
 include '../objects/_db_set.php'; 
  
 include '../objects/_search_fields.php'; 
  
    include '../../views/objects/_paging_2.php';

    include '../../views/objects/_examplesQuery.php';

$width_1="";

 if(isset($_SESSION["pgtype"])) {
if($_SESSION["pgtype"]=='normal'){
	$width_1=200;
} 
}
    echo "<table border='1' align='center'><tr><th width='$width_1' align='center'>First Name</th>";
	 echo "<th width='$width_1'  align='center'>Last Name</th>";
  echo "<th width='$width_1'  align='center'>Age</th>";
  echo "<th width='$width_1'  align='center'>Email</th></tr>";
 
 
 
    $i=0;
	
    foreach($result as $row)
    {  $i=1; 
        echo "<tr><td  align='left'>".$row["firstName"]."</td><td align='left'>".$row["lastName"]."</td><td align='left'>".$row["age"]."</td><td align='left'>".$row["email"]."</td></tr>";
	}
	if($i==0){ 
        echo "<tr><td colspan='4'>". "No records found" . "</td></tr>";
	} 
    echo "</table>";
	
  $conn = null;
  
  
?>
