<!DOCTYPE HTML>
<html>
<head>

<?php
session_start();
include("bootstrap.php");
include("landing_util.php");

include_once("db_connect.php");
?>

<!--script src="https://kit.fontawesome.com/2020037322.js" crossorigin="anonymous"></script-->

<link href="landing_style.css" rel="stylesheet" type="text/css">

<title>Lost and Found</title>

</head>

<body>
<div class="container">
    <div class="row header">
        <div class="col-md-1">
            <img src="res/logo.png" alt="Cannot find logo" width="75" height="75">
        </div>
        
        <div class="col-md-6 search-box">
            <input id="search-txt" type="text" name="" placeholder="Type to search" />
            <a id="search-btn" href="#"></a>
            <i class="far fa-search"></i>
        </div>
        
        <div class="col-md-1 spaceCol">
        </div>
        
        <div class="col-md-1 profileCol">
            <img id="profile" src="res/bg.png" alt="Cannot find picture" width="55" height="55">
        </div>
        
        <div class="col-md-2 name">
            <a href="#" class="pst-name">John Smith </a> <!-- need to make a php function that gets name from uid-->
  	</div>
  	
  	<div class="col-md-1 settings">
    	Settings <!--need a logo-->
  	</div>
    </div>
   	 
   <div class="row">
       <div class="col-md-2 column post_button">
           <a href="./submitFound.php">I Found an Item</a>
       </div>
       
       <div class="col-md-2 column post_button">
           <a href="./submitLost.php">I lost and item</a>
       </div>
    </div>
    
    <?php showFeedPost($db); ?>
    
</div>
</body>
</html>
