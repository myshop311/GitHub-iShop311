<?php 

 $searchArray = explode(" ",$searchTxt);
 

 $fields[0]="" ;
 $fields[1]="" ;
 $fields[2]="";
 
 if(count( $searchArray)>3){
 $searchstrLen =3;
 }
 else{
	$searchstrLen =count($searchArray); 
 }

 for($i=0;$i<$searchstrLen;$i++){
	 $fields[$i]= $searchArray[$i]; 
 }
 ?>