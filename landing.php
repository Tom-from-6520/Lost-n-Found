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
       let sign = confirm("Are you sure you want to claim this?");

        if (sign == true) {
               document.writeln("<?php print addClaimedItem($db, $_SESSION['uid']); ?>");
        }
   }
   
   </script>

</head>

<body>
<div class="container">
    <form name='searchForm' method='POST' action='landing.php?op=search'> 
    <div class="row header">
        <div class="col-md-1">
            <img src="res/logo.png" alt="Cannot find logo" width="75" height="75">
        </div>
        
        <div class="col-md-1 input-field">
        <select name="ddlStatus" required>
        <option value="F">Found Item</option>
        <option value="L">Lost Item</option>
        </select>
        </div>
        <div class="col-md-1 input-field">
        <select name="ddlCategory" required>
        <option value="all">All</option>
        <option value="electronics">Electronics</option>
        <option value="clothing">Clothing</option>
        <option value="school_supp">School Supplies</option>
        <option value="personal">Personal Items</option>
        <option value="misc">Miscellaneous</option>
        </select>
        </div>
        <div class="col-md-3 search-box">
            <input id="search-txt" type='text' name='tfTerm' placeholder="Type to search"/>
        </div>
        <div class="col-md-1 input-field">
        <img src='./res/search-logo.png' width="27" height="27" onClick="submit()">
        <input type="hidden" name="action" value="Submit Form"/>
        </div>
        

        <?php
            if($_SESSION['uid'] == null) {
                print "<div class='col-md-3 name'><a href='login.php'>Log In </a></div>";
            }
            else {
                $name = $_SESSION['uid'];
                
                print "<div class='col-md-1 profileCol'>" . 
                        "<img id='profile' src='res/bg.png' alt='No picture' width='55' height='55'>" . 
                        "</div>";
                print "<div class='col-md-2 name'>" . 
                        "<a href=./profile.php>" . getName($db, $name) . "</a>" .
                        "</div>";
                 print "<div class='col-md-2 name'>" . 
                        "<a href=./logout.php>" . "Log Out" . "</a>" .
                        "</div>";        
            }
        ?> 
    </div>
    </form>
       
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
    
   <?php
   	$op = $_GET['op'];
   	
   	if($op == "delete"){
   		deletePost($db);
   	} 
   	if($op == "search"){
   	    print "<center>SEARCH RESULT</center>";
            $status = $_POST['ddlStatus'];
            $terms = $_POST['tfTerm']; 
            $category = $_POST['ddlCategory'];
            searchPost($db, $status, $category, $terms);
   	} 
   	else { 
   	    showFeedPost($db);
   	}
   ?>
</div>
</body>
</html>