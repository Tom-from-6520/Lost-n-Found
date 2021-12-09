<?php
include_once("db_connect.php");
session_start();

//----------USER INFORMATION FUNCTIONALITIES----------

function getName($db, $user_id) {
    $str = "SELECT fname, lname FROM users WHERE id='$user_id';";
    $res = $db->query($str);
    if($row = $res->fetch()) return ($row['fname'] . ' ' . $row['lname']);
}

//----------POST RELATED FUNCTIONALITIES------------------------------

function showFeedPost($db){
    
    $str = "SELECT id, category, poster_id FROM items ORDER BY org_date DESC;\n";
    $res = $db->query($str);
    
    if($res != false && $res->rowCount() > 0){
    	
    	$i = 0;
    	$m = 0;	
   	 while($row = $res->fetch()){
   	     $item_id = $row['id'];
   	     $poster_id = $row['poster_id']; 
   	     $category = $row['category'];
   	     $name = getName($db, $poster_id);
   	     
   	     //styling for the name and header of each post
   	     print "<div class='row post'>";
   	     print "<div class='col-md-.5'><img id= 'profile' src='res/bg.png' alt='Cannot find picture' width='35' height='35'></div>\n";
   	     print "<div class='col-md-3 post-name'><a href='profile.php'> $name </a></div>\n";
   	     print "<div class='col-md-5 post'></div>\n";
		if($poster_id == $_SESSION['uid']) {
			print "<div class='col-md-1'>";
			print "<a href=./postEdit.php?id=$item_id>Edit</a>\n";
			print "</div>";
			
			print "<div class='col-md-1'>";
			print "<div class='col-md-1'><a href='deletePost.php?op=landing&id=$item_id&cat=$category'>Delete</a></div>\n";
			print "</div>";
		}
   	     print "</div>";
   	     
   	     print "<div class = 'row post'>";
   	     
   	     $str = "SELECT * FROM (SELECT * FROM items WHERE id=$item_id) AS I JOIN desc_$category ON id=item_id;\n";
   	     $res_row = $db->query($str);
   	     $row_full = $res_row->fetch();
   	     $detail = $row_full['detail'];
   	     print "&nbsp &nbsp &nbsp &nbsp$detail<br/>\n";
   	     print "</div>";
         
         $uid = $_SESSION['uid'];
         $btnName = "claimBtn" . $i;
         $i++;
         print "<div class = 'row post'><div class='col-md-12'><br/></div></div>";
         print "<div class ='row post'><div class = 'col-md-1'></div><div class='col-md-10'>------------------------------------------------------------------------</div></div>\n";
         print  "<div class = 'row post'>";
         print "<div class = 'col-md-1'></div>";
          	if($_SESSION['uid'] == null) {
          		$i = 0;
               	print "<div class='col-md-2' align ='center'><a href='login.php'>Claim</a></div>";
         		print "<div class='col-md-1'> | </div>";
         		print "<div class='col-md-2'><a href='login.php'>Message</a></div>";  
         		print "</div>"; 
         		print "<div class ='row post'><div class = 'col-md-1'></div><div class='col-md-10'>------------------------------------------------------------------------</div></div>\n";
            }
            
            	else{
         		print "<div class='col-md-2' align ='center' id='$btnName'><a href='landing.php?id=$item_id&uid=$uid'>Claim</a></div>\n";
         		print "<script>document.getElementById('$btnName').addEventListener('click', confirmClaim); </script>\n";
         		print "<div class='col-md-1'> | </div>";
         		print "<div class='col-md-2'><a href='handleButtons.php?op=sendmsg&sendid=$poster_id'>Message</a></div>\n";  
         		print "</div>"; 
         		print "<div class ='row post'><div class = 'col-md-1'></div><div class='col-md-10'>------------------------------------------------------------------------</div></div>\n";
   		 }
   		 print "<div class = 'row'><div class='col-md-12'><br/></div></div>\n";
  	  }
	}
}

function showPersonalPost($db){
    
    $id= $_SESSION['uid'];
    $str = "SELECT id, category, poster_id FROM items WHERE poster_id='$id' ORDER BY org_date DESC;\n";
    $res = $db->query($str);
    
    if($res != false && $res->rowCount() > 0){
   	 while($row = $res->fetch()){
   	     $item_id = $row['id'];
   	     $poster_id = $row['poster_id']; 
   	     $category = $row['category'];
   	     $name = getName($db, $poster_id);
   	     
   	     //styling for the name and header of each post
   	     print "<div class='row post'>\n";
   	     print "<div class='col-md-.5'><img id= 'profile' src='res/bg.png' alt='Cannot find picture' width='35' height='35'></div>\n";
   	     print "<div class='col-md-3 post-name'><a href='profile.php'> $name </a></div>\n";
   	     print "<div class='col-md-2 post'></div>\n";
	     print "<div class='col-md-1'>\n";
	     print "<a href=./postEdit.php?id=$item_id>Edit</a>\n";
	     print "</div>";
			
	     print "<div class='col-md-1'>\n";
	     print "<div class='col-md-1'><a href='deletePost.php?op=profile&id=$item_id&cat=$category'>Delete</a></div>\n";
	     print "</div>\n";
   	     
   	     print "<div class = 'row post'>\n";
   	     
   	     $str = "SELECT * FROM (SELECT * FROM items WHERE id=$item_id AND poster_id='$id') AS I JOIN desc_$category ON id=item_id;\n";
   	     $res_row = $db->query($str);
   	     $row_full = $res_row->fetch();
   	     $detail = $row_full['detail'];
   	     print "&nbsp &nbsp &nbsp &nbsp$detail<br/>\n";
   	     print "</div>\n";
    }
  }
}

?>
