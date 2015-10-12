<?php

$dateString=date('Y-m-d-h-i-s');

$fileName = "../data/newfile_". $dateString . ".xls";

$myfile = fopen("$fileName", "w") or die("Unable to open file!");
$txt = $html_a; 

fwrite($myfile, $txt);
fclose($myfile);
?>