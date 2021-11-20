<?php

include_once("db_connect.php");

print "</h3> Hello world </h3>";

$category=$_POST['Uddl'];
$cur_loc=$_POST['UcurLoc'];
$org_loc=$_POST['UfoundLoc'];
$description = $_POST['UtArea'];
$date = date('Y-m-d h:i:s', time());

print $category;
		
$str = "UPDATE items SET category='$category', $cur_loc WHERE id=$item_id";
$res = $db->query($str);

if($res != false){
	print "Updated!";
}
if($res == false){
	print "Error updating, please try again";
}





?>
