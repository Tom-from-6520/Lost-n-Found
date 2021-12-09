
<?php
include_once("db_connect.php");
include_once("landing_util.php");
session_start();

$op = $_GET['op'];

if($op == 'sendmsg'){
  $receiver = $_GET['sendid'];
  $id = $_SESSION['uid'];
  $name = getName($db, $receiver);
  
  print "<h2>Send Message to $name </h2>";
  
  print "<form name='msgForm' method='POST' action='addMsg.php?op=fromMain&sender=$id&receiver=$receiver'>";
  print "<textarea name='taContent'>";
  print "</textarea><br/><br/>";  
  print "<input type='submit' value='Send Message'/>";
  print "</form>";

}

else if($op =='sendSelectMsg'){

  	print "<form method='POST' action='addMsg.php?op=sendmsg'>";
  	print "<p>Recipient</p>";
  	print "<SELECT name='ddlreceiver'>";

  	$qry = "SELECT * FROM users;";
  
  	$res = $db->query($qry);

  	if($res != FALSE){
	  while($row = $res->fetch()){
		  $id = $row['id'];
		  $name = getName($db, $id);
		  $tRow = "<option value='$id'>$name</option>\n";
		  print $tRow;
	  }
	
  }
  print "</SELECT>";
  print "<BR /> <BR/>";

  print "<textarea name='taContent'>";
  print "</textarea><br/><br/>";

  print "<input type='submit' value='Send Message'/>";
  print "</form>";

}

function addClaimedItem($db, $id){
  	$item_id = $_GET['id'];
  	$curDate = date('Y-m-d h:i:s', time());
  	$str = "INSERT INTO claim (user_id, item_id, date_claimed) VALUE ('$id', $item_id, '$curDate')";
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
?>
