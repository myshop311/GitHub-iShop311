<?php 
$so = 1;
if(isset($_GET["so"])){
	if (!filter_var($_GET["so"], FILTER_VALIDATE_INT) === false && $_GET["so"] <=3 && $_GET["so"] > 0){
	$so= $_GET["so"];
	}  
}
	 $soTypeText= "";
	 
if(isset($_GET["soTypeText"])){
	 $soTypeText= $_GET["soTypeText"];
}


if(isset($_GET["searchTxt"])){
	 $searchTxt= $_GET["searchTxt"];
}


$width_a="";
 
 include 'objects/_objects_subgroup.php'; 
  

$width_1="";

 if(isset($_SESSION["pgtype"])) {
if($_SESSION["pgtype"]=='normal'){
	$width_1=200;
} 
}
$html="";
 
 $html .= "<table border='1' width='600'>";
 
$html .= "<tr><th colspan='4'><p><center><b>Examples</b></center></p></th></tr>";

 
 $html .= "<tr><th>First Name</th>";
	 $html .= "<th>Last Name</th>";
 $html .= "<th> Age</th>";
 $html .= "<th>Email</th></tr>";
 

    $i=0; 
	 
    foreach($result as $row)
    {  $i=1; 
       $html .=  "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["age"]."</td><td>".$row["email"]."</td></tr>";
	}   
   
 $html .= "</table>";
 
 
	$html_a = str_ireplace('\'', '\"', $html); //echo $html_a ;
	
	//$html_a = $html;
	  
  include 'objects/_write_file.php'; 
   
?>

<form name="excelForm" method="post" action="exaExcel2.php?fileName=<?php echo $fileName; ?>">
</form>
<script>  
 var frm = document.excelForm;
 frm.submit();
	 </script> 
