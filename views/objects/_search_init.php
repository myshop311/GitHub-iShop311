

<?php  
$searchTxt="";
$soType=0;
	$soTypeText="asc";
	$soTypeTemp =0;
	
if(isset($_POST["searchTxt"])){ 
	$searchTxt= $_POST["searchTxt"]; //echo 'post' . $_POST["searchTxt"];
}
 
 
if(isset($_GET["searchTxt"])){ 
	$searchTxt= $_GET["searchTxt"]; //echo 'get' . $_GET["searchTxt"];
}

 
if(isset($_GET["soType"])){ 
	$soTypeTemp= $_GET["soType"]; //echo 'get' . $_GET["searchTxt"];
}
if($soTypeTemp ==0){
	$soType=1; 
}
	else{
		$soType=0; 
	}
 

if($soType==0){
	$soTypeText="";
	}
	else{ 
	$soTypeText="desc";
		
}
  
?>







