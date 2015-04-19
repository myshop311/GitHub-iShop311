
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
 include '../../views/objects/_objects_subgroup.php'; 
  

$width_1="";

 if(isset($_SESSION["pgtype"])) {
if($_SESSION["pgtype"]=='normal'){
	$width_1=200;
} 
}
$html="";
 
$html .= "<p><center><b>Examples</b></center></p>";
 $html .= "<tr><th>First Name</th>";
	 $html .= "<th>Last Name</th>";
 $html .= "<th> Age</th>";
 $html .= "<th>Email</th></tr>";
 

    $i=0;
	 
    foreach($result as $row)
    {  $i=1; 
       $html .=  "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["age"]."</td><td>".$row["email"]."</td></tr>";
	}   
   
	$html_a = str_ireplace('\'', '\"', $html); //echo $html_a ;
	
	//$html_a = $html;
	 
	
  $conn = null;
	 
  //include '../../views/objects/_write_file.php';
?>
	 <form name="pdfForm" method="post" action="pdfCom.php">
	 <input type="hidden" name="html_a" value="<?php echo $html_a; ?>">
	 
	 
	 </form>
	 
 <script>  
 var frm = document.pdfForm;
 frm.submit();
	 </script>
	 
