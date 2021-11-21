<?php	
session_start();
include_once('db_connect.php');

$name = $_POST['tfName']; 
$category = $_POST['ddl']; 
$org_loc = $_POST['foundLoc'];
$curr_loc = $_POST['currLoc'];
$item_type = $_POST['tfType'];
$brand = $_POST['tfBrand'];
$color = $_POST['tfColor'];
$detail = $_POST['taDetail']; 
$date = date('Y-m-d h:i:s', time());
$poster_id = $_SESSION['uid'];

$str = "INSERT INTO items(status, category, org_loc, curr_loc, poster_id, org_date)"
	."VALUE('F', '$category', '$org_loc', '$cur_loc', '$poster_id', '$date');";
	
if($db->query($str) == FALSE){
    print "Error adding item";
} 

$str = "SELECT * FROM items WHERE status='F' AND poster_id='$poster_id' AND org_date='$date';";
$res = $db->query($str);
$item = $res->fetch();
$item_id = $item['id'];

$str = "INSERT INTO desc_electronics VALUE($item_id, 'F', '$item_type', '$name', '$brand', '$color', '$detail');";
if($db->query($str) == FALSE){
    print "Error adding description";
} 
else {
    header('Location: ./landing.php');
}
?>