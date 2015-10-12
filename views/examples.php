<?php 
$so = 1;
if(isset($_GET["so"])){
	if (!filter_var($_GET["so"], FILTER_VALIDATE_INT) === false && $_GET["so"] <=3 && $_GET["so"] > 0){
	$so= $_GET["so"];
	}  
}
 
 echo "<p><center><b>Examples</b></center></p>";
 
  echo "<p><center><b>Please click on header to sort the list.</b></center></p>";
 include 'objects/_objects_group.php'; 
 

$width_1="";

 if(isset($_SESSION["pgtype"])) {
if($_SESSION["pgtype"]=='normal'){
	$width_1=200;
} 
}

 $soType_link=0;
 if($soType==0 ||  $soType ==''){
	 $soType_link=1;
 }
   
 $link_str ="pageid=$pageid&soType=$soType_link&so=$so&maxRow=$maxRow&searchTxt=$searchTxt";
  $strPre ="<table width='80%'><tr><td width='70%'>";
  $str1="<td align='right' nowrap='nowrap'><a href='views/exaExcel.php?$link_str' target='_blank'><b>View Excel</a> | ";
 
  $str2=" <a href='pdf/objects/exaPdf.php?$link_str' target='_blank'><b> View PDF</a></td>";
  
  $strEnd ="</tr></table>";
  
  $str = $strPre . $str1 .  $str2 . $strEnd;
  
  
  echo $str;
  
    echo "<table border='1' align='center'><tr><th width='$width_1'  align='center'><a href='?page=examples&so=1&searchTxt=$searchTxt&soType=$soType'>First Name</a></th>";
	 echo "<th width='$width_1'  align='center'><a href='?page=examples&so=2'>Last Name</a></th>";
  echo "<th width='$width_1'  align='center'><a href='?page=examples&so=3&searchTxt=$searchTxt&soType=$soType'>Age</a></th>";
  echo "<th width='$width_1'  align='center'><a href='?page=examples&so=4&searchTxt=$searchTxt&soType=$soType'>Email</a></th></tr>";
 
 
 
    $i=0;
	
    foreach($result as $row)
    {  $i=1; 
        echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["age"]."</td><td>".$row["email"]."</td></tr>";
	}
	if($i==0){ 
        echo "<tr><td colspan='4'>". "No records found" . "</td></tr>";
	} 
    echo "</table>";
	
  $conn = null;
  
  
?>
