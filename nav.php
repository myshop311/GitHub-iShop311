<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div id="wrap" >
  <header>
    <div class="inner relative"> <br>
      <br>
      <br>
	  <?php 
	  $todatDate = date("F j, Y");
	  ?>
      <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
      <nav id="navigation">
        <ul id="main-menu">  
          <li class="current-menu-item"><a href="index.html">iDemo311.com Home</a></li>
		  
          <li class="current-menu-item"><a href="index1.php">PHP Home</a></li>
          <li class="parent"> <a href="#">Examples</a>
            <ul class="sub-menu">
              <li><a href="?page=examples">Examples 1</a></li>
              <li><a href="?page=examples2">Examples 2</a></li>
            </ul>
          </li>
          <li class="parent"> <a href="#">Menu 1</a>
            <ul class="sub-menu">
              <li><a href="?page=login">Login</a></li>
              <li><a href="?page=register">Register</a></li>
              <li><a href="?page=myaccount">My Account</a></li>
              <li><a href="?page=logout">Logout</a></li>
            </ul>
          </li>
          <li class="parent"> <a href="#">Menu 2</a>
            <ul class="sub-menu">
              <li><a href="?page=aboutus">About</a></li>
              <li><a href="?page=contactus">Contact</a></li>
            </ul>
          </li>
          <li class="current-menu-item"> </li>
          <li class="current-menu-item"> <a href="#"><?php echo   $todatDate; ?></a> </li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
  </header>
</div>
</body>
</html>