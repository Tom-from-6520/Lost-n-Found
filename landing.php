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
        
        <?php
            if($_SESSION['uid'] == null) {
                print "<div class='col-md-4 name'><a href='login.php'>Log In </a></div>";
            }
            else {
                $name = $_SESSION['uid'];
                
                print "<div class='col-md-1 profileCol'>" . 
                        "<img id='profile' src='res/bg.png' alt='No picture' width='55' height='55'>" . 
                        "</div>";
                print "<div class='col-md-2 name'>" . 
                        "<a href=#>" . getName($db, $name) . "</a>" . //TODO make page user.php?id=$name
                        "</div>";  
                print "<div class='col-md-1 settings'> Settings </div>";
            }
        ?> 
    </div>
       
   <div class="row">
   <div class="col-md-2 spaceCol">
   </div>
       <div class="col-md-2 column post_button">
           <a href="./submitFound.php">I Found an Item</a>
       </div>
       
       <div class="col-md-2 column post_button">
           <a href="./submitLost.php">I lost an Item</a>
       </div>
    </div>
    
    <?php showFeedPost($db); ?>
   
</div>
</body>
</html>

