
<?php
include_once("db_connect.php");
include_once("landing_util.php");
session_start();

$op = $_GET['op'];



if($op == 'sendmsg'){
  $receiver = $_GET['sendid'];
  
  $name = getName($db, $receiver);
  
  print "<h2>Send Message to $name </h2>";
  
  print "<form name='msgForm' method='POST' action='addMsg.php?sender=$id&receiver=$receiver'>";
  print "<textarea name='taContent'>";
  print "</textarea><br/><br/>";  
  print "<input type='submit' value='Send Message'/>";
  print "</form>";

}

function addClaimedItem($db){
	$id = $_SESSION['uid'];
  	$item_id = $_GET['id'];
  	$curDate = date('Y-m-d h:i:s', time());
  	$str = "INSERT INTO claim (user_id, item_id, date_claimed) VALUE ('$id', $item_id, '$curDate')";
  	print($str);
  	$res = $db->query($str);
  
  	if($res != false){
  	
      	print "<script>";
      	
      	print "alert($str);";
      	
      	print "</script>";
 }
 
 if($res == false){
 	print "ERROR W QUERY";
 }
}

/*function deletePost($db){
	$id = $_GET['id'];
	$category = $_GET['cat'];
	
	$delStr = "DELETE FROM items WHERE id=$id;";
	
	$res = $db->($delStr);
	
	if($res != FALSE){
	
		$delStr2 = "DELETE FROM desc_$category WHERE item_id=$id;";
		
		$res2 = $db->query($delStr2);
		
		if($res2 != FALSE){
			header('Location: ./landing.php');	
		}	
	}

}*/
?>
