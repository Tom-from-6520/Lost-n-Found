<?php

include_once("db_connect.php");

$sender= $_GET['sender'];
$receiver =$_GET['receiver'];

$content = $_POST['taContent'];
$sent = date('Y-m-d h:i:s', time());

$str = "INSERT INTO message(sender, receiver, content, sent)"
		."VALUE('$sender', '$receiver', '$content', '$sent');";
		
$res = $db->query($str);

if($res != false){
	header('Location: ./landing.php');
}
else{

	print "ERROR WITH QUESRY";
}		
		
?>
