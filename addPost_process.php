<?php	
session_start();
include_once('db_connect.php');

$name = $_POST['tfName']; 
$category = $_POST['ddlCat']; 
$org_loc = $_POST['orgLoc'];
$curr_loc = $_POST['currLoc'];

$item_type = $_POST['tfType'];
$brand = $_POST['tfBrand'];
$color = $_POST['tfColor'];
$size = $_POST['tfSize'];

$detail = $_POST['taDetail']; 
$date = date('Y-m-d h:i:s', time());
$poster_id = $_SESSION['uid'];

$op = $_GET['op'];
$str = "";
if ($op == 'found') {
$str = "INSERT INTO items(status, category, org_loc, curr_loc, poster_id, org_date) " .
	"VALUE('F', '$category', '$org_loc', '$curr_loc', '$poster_id', '$date');";
print_r($str);
}
elseif ($op == 'lost'){
    $str = "INSERT INTO items(status, category, org_loc, poster_id, org_date) " .
	"VALUE('L', '$category', '$org_loc', '$poster_id', '$date');";
}
$res = $db->query($str);
if($res == false){
    print "Error adding item";
} 

$str = "SELECT * FROM items WHERE poster_id='$poster_id' AND org_date='$date';";
$res = $db->query($str);
$item = $res->fetch();
$item_id = $item['id'];

$str = "";
if ($category == 'electronics') {
    $str = "INSERT INTO desc_electronics VALUE($item_id, 'F', '$item_type', '$name', '$brand', '$color', '$detail');";
}
else if ($category == 'clothing') {
    $str = "INSERT INTO desc_clothing VALUE($item_id, 'F', '$item_type', '$brand', '$color', '$size', '$detail');";
}
else if ($category == 'school_supp') {
    $str = "INSERT INTO desc_school_supp VALUE($item_id, 'F', '$item_type', '$name', '$color', '$detail');";
}
else if ($category == 'personal') {
    $str = "INSERT INTO desc_personal VALUE($item_id, 'F', '$item_type', '$detail');";
}
else if ($category == 'misc') {
    $str = "INSERT INTO desc_misc VALUE($item_id, 'F', '$item_type', '$name', '$detail');";
}
if($db->query($str)){
    header('Location: ./landing.php');
} 
?>