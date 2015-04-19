<?php
$recordFound = 0;
 
require 'controllers/loginaction.php';
if ($recordFound == 1){
header('Location: ?page=examples');
}
elseif (!isset($_SESSION["loginName"]) && isset($_POST["loginSubmit"])){
echo "Your login is not valid. Please verify the login and try again.";
}
?>

<section class="login" align="center">
  <form name="loginForm" method="post" action="?page=login">
    <?php 
//if ($_SESSION["reg"]==1){
//echo "You are registered successfully. Please login to continue.";	
//}
?>
    <table align="center">
      <tr>
        <td></td>
        <td><p align="center">
          
          <h1>Hello!</h1>
          </p>
          <p>Log-in to access!</p></td>
      </tr>
      <tr>
        <td><p>Email:</td>
        <td><input type="email" name="email" value=""></td>
      </tr>
      <tr>
        <td><p>Password:</td>
        <td><input type="password" name="password"  ></td>
      </tr>
      <tr>
        <td></td>
        <td><input name="loginSubmit" type="submit" class="btn" value="Login"></td>
      </tr>
      <tr>
        <td></td>
        <td><p>or <a href="?page=register">register</a></p>
          </p></td>
      </tr>
    </table>
  </form>
</section>
