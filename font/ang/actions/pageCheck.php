
<?php
 
$sql = "SELECT id, pageName FROM ishopPages where pageName='$pageName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $pagePass =1;
    }
} else {
    $pagePass =0;
} 
 

?>







