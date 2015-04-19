<?php 

include '_search_init.php';
//echo $searchTxt;
?>

<section class="login" align="center">
  <form name="searchForm" method="post" action="?page=examples">
    <table align="center">
      <tr>
        <td><p>Search:</td>
        <td><input type="text" name="searchTxt" value="<?php echo $searchTxt; ?>">
          <input name="searchSubmit" type="submit" class="btn" value="Search"></td>
      </tr>
    </table>
  </form>
</section>
