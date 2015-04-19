<section class="login" align="center">
  <?php
$firstName="";
$lastName="";

$age="";
$email="";
$password="";
?>
  <?php 
$reg =0;
$meg='';
//$_SESSION["loginName"]="";

//$_SESSION["email"]="";


include 'controllers/registerValidate.php';

if($error ==0){
include 'controllers/registerAction.php';
}

if($reg ==1){
	$_SESSION["reg"]=$reg;
header('Location: ?page=login');
}
else
{
echo $meg;
}

?>
  <style>
.error{
color:red;
}
</style>
  
  
  <form name="regform" method="post" action="?page=register">
    <table align="center" border="0">
    <tr>
      <td></td>
      <td><h1>Hello!</h1></td>
    </tr>
    <tr>
      <td></td>
      <td><p>Welcome to Register!</p></td>
    </tr>
    <tr>
      <td align="left">First Name: </td>
      <td  align="left"><input type="text" name="firstName"  value="<?php echo $firstName; ?>">
        <span class="error">* <?php echo $firstNameErr;?></span></td>
    </tr>
    <tr>
      <td  align="left"> Last Name: </td>
      <td  align="left"><input type="text" name="lastName" value="<?php echo $lastName; ?>">
        <span class="error">* <?php echo $lastNameErr;?></span></td>
    </tr>
    <tr>
      <td  align="left"> Age: </td>
      <td  align="left"><input type="text" name="age" size="4" maxlength="4" value="<?php echo $age; ?>">
        <span class="error">* <?php echo $ageErr;?></span></td>
    </tr>
    <tr>
      <td  align="left"> Email: </td>
      <td  align="left"><input type="email" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr;?></span></td>
    </tr>
    <tr>
      <td  align="left"> Password: </td>
      <td  align="left"><input type="password" name="password"  value="<?php echo $password; ?>">
        <span class="error">* <?php echo $passwordErr;?></span></td>
    </tr>
    <tr>
      <td></td>
      <td  align="left"><input type="submit" name="registerSubmit" value="Register" class="btn"></td>
    </tr>
    <tr>
      <td></td>
      <td><p>or <a href="?page=login">Login</a></p></td>
    </tr>
  </form>
</section>
