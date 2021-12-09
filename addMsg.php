<?php
session_start();
include_once("db_connect.php");
include_once("landing_util.php");

$op = $_GET['op'];

if ($op == 'fromMain'){
	$sender= $_GET['sender'];
	$receiver =$_GET['receiver'];

	$content = $_POST['taContent'];
	$sent = date('Y-m-d h:i:s', time());

	$str = "INSERT INTO message(sender, receiver, content, sent)"
		."VALUE('$sender', '$receiver', '$content', '$sent');";
		
	$res = $db->query($str);

	if($res != false){
		$name = getName($db, $receiver);
		print "<p>Message sent to $name!</p> \n";
		print "<a href='landing.php'>Go to home </a> \n";
    		print "</br>";
    		print "<a href='profile.php'>Go to profile </a> \n";
	}
	else{

		print "ERROR WITH QUERY";
	}
}

else if($op == 'sendmsg') {
	$sender = $_SESSION['uid'];
  	$receiver = $_POST['ddlreceiver'];
  	$content = $_POST['taContent'];
  	$sent = date('Y-m-d h:i:s', time());
	
	$str = "INSERT INTO message(sender, receiver, sent, content)"
		."VALUE('$sender', '$receiver', '$sent', '$content');";
		
	$res= $db->query($str);
	
	if($res == FALSE){
		print "<p>Error sending message</p>\n";
	}
	
	else{
		$name = getName($db, $receiver);
		print "<p>Message sent to $name !</p>\n";
    		print "<a href='landing.php'>Go to home </a> \n";
    		print "</br>";
    		print "<a href='profile.php'>Go to profile </a> \n";
	}
}		
		
?>
