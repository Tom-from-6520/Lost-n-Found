<!DOCTYPE HTML>
<html>
<head>

<?php
session_start();
include("bootstrap.php");
include("landing_util.php");
include_once("db_connect.php");
include("handleButtons.php");
?>

<link href="landing_style.css" rel="stylesheet" type="text/css">

<title>Lost and Found</title>

<script>
   function confirmClaim() {
       let sign = prompt("Are you sure you want to claim this? Type Yes or No");

        if (sign.toLowerCase() == "yes") {
               document.writeln("<?php print addClaimedItem($db); ?>");
        }
   }
   
   document.getElementById('claimBtn').addEventListener("click", confirmClaim);
   </script>

</head>

<body>
<div class="container">
    <div class="row header">
        <div class="col-md-1">
            <img src="res/logo.png" alt="Cannot find logo" width="75" height="75">
        </div>
        
        <div class="col-md-6 search-box">
            <input id="search-txt" type="text" name="" placeholder="Type to search" />
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
                        "<a href=./profile.php>" . getName($db, $name) . "</a>" .
                        "</div>";
            }
        ?> 
    </div>
       
   <div class="row">
   <div class="col-md-2 spaceCol">
   </div>
       <div class="col-md-2 column post_button">
           <a href="./addPost.php?op=found">I Found an Item</a>
       </div>
       
       <div class="col-md-2 column post_button">
           <a href="./addPost.php?op=lost">I lost an Item</a>
       </div>
    </div>
    
    <?php showFeedPost($db); ?>
  
   
   <?php
   
   	$op = $_GET['op'];
   	
   	if($op == "delete"){
   		deletePost($db);
   	}
   
   ?>
</div>
</body>
</html>
