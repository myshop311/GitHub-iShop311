<?php  
 include 'objects/_db_set.php'; 
 
 echo "<p><center><b>Examples</b></center></p>";
  
include 'objects/_search_init.php';
//echo $searchTxt;
 ?>

<section class="login" align="center">
  <form name="searchForm" method="post" action="?page=examples">
    <table align="center" border="0">
      <tr valign="top">
        <td></td>
        <td>Search:
          <input type="text" name="searchTxt" value="<?php echo $searchTxt; ?>" onkeyup="showHint(this.value)">
          <p> <span id="txtHint"></span></p></td>
      </tr>
    </table>
  </form>
</section>
<script>
function showHint(str) { 
     if (str.length == 0) { 
         document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("txtHint").innerHTML =  xmlhttp.responseText;
             }
         }
         xmlhttp.open("GET", "views/objects/_examples2.php?searchTxt="+str, true);
         xmlhttp.send();
     }
}
</script> 
