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
    
    $str = "SELECT id, category, poster_id FROM items ORDER BY org_date DESC;";
    $res = $db->query($str);
    
    if($res != false && $res->rowCount() > 0){
   	 while($row = $res->fetch()){
   	     $item_id = $row['id'];
   	     $poster_id = $row['poster_id']; 
   	     $category = $row['category'];
   	     $name = getName($db, $poster_id);
   	     
   	     //styling for the name and header of each post
   	     print "<div class='row post'>";
   	     print "<div class='col-md-.5'><img id= 'profile' src='res/bg.png' alt='Cannot find picture' width='35' height='35'></div>\n";
   	     print "<div class='col-md-3 post-name'><a href='#'> $name </a></div>";
   	     print "<div class='col-md-5 post'></div>";
   	     print "<div class='col-md-2'>";
         print "<form action='postEdit.php'>";
         print "<input type='submit' value='Edit'/>";
         print "</form>";
         print "</div>";
   	     print "</div>";
   	     
   	     print "<div class = 'row post'>";
   	     
   	     $str = "SELECT * FROM (SELECT * FROM items WHERE id=$item_id) AS I JOIN desc_$category ON id=item_id;";
   	     $res_row = $db->query($str);
   	     $row_full = $res_row->fetch();
   	     $detail = $row_full['detail'];
   	     print "$detail<br/>\n";
   	     print "</div>";
   	     
   	     print "<div class = 'row'><div class='col-md-12'><br/></div></div>";
   	     
   	     //showPost($db, $item_id, "found", $item_type);
   	 }
    }
}

//currently serves no purpose
function showPost($db, $item_id, $category, $item_type){
    $quer = "SELECT * FROM item_$category JOIN desc_$item_type ON item_id=id WHERE id=$item_id;";
    
    $res= $db->query($quer);
    
    if($res != false){
   	 
    }
}
?>
