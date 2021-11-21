<?php
include_once("db_connect.php");

$category=$_POST['Uddl'];
$curr_loc=$_POST['UcurLoc'];
$org_loc=$_POST['UfoundLoc'];
$description = $_POST['UtArea'];
$date = date('Y-m-d h:i:s', time());

$item_id = $_GET['id'];	
$str = "UPDATE items SET category='$category', org_loc='$org_loc', curr_loc='$curr_loc' WHERE id=$item_id";
$res = $db->query($str);

if($res){
    header('Location: ./landing.php');
}
else {
    print "Error updating, please try again";
}
?>