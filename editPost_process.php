<?php
include_once("db_connect.php");

$category=$_POST['ddlCat'];
$org_loc = $_POST['tfOrgLoc'];
$curr_loc=$_POST['tfCurLoc'];
$detail = $_POST['taDetail'];

$name = $_POST['tfName'];
$item_type = $_POST['tfType'];
$brand = $_POST['tfBrand'];
$color = $_POST['tfColor'];
$size = $_POST['tfSize'];

$item_id = $_GET['id'];
$str = "SELECT * FROM items WHERE id=$item_id;";
$res = $db->query($str);
$item = $res->fetch();
$old_cat = $item['category'];
$status = $item['status'];

if($category == $old_cat) {
    $str = "UPDATE items SET org_loc='$org_loc', curr_loc='$curr_loc' WHERE id=$item_id;";
    $res = $db->query($str);
    
    switch($old_cat) {
    case 'electronics':
        $str = "UPDATE desc_electronics SET item_type='$item_type', name='$name', brand='$brand', color='$color', detail='$detail' WHERE item_id=$item_id;";
        break;
    case 'clothing':
        $str = "UPDATE desc_clothing SET item_type='$item_type', brand='$brand', color='$color', detail='$detail', clothing_size='$size' WHERE item_id=$item_id;";
        break;
    case 'school_supp':
        $str = "UPDATE desc_school_supp SET item_type='$item_type', name='$name', color='$color', detail='$detail' WHERE item_id=$item_id;";
        break;
    case 'personal':
        $str = "UPDATE desc_personal SET item_type='$item_type', detail='$detail' WHERE item_id=$item_id;";
        break;
    case 'misc':
        $str = "UPDATE desc_misc SET item_type='$item_type', name='$name', detail='$detail' WHERE item_id=$item_id;";
        break;
    }
    $res = $db->query($str);
}
else {
    $str = "DELETE FROM desc_$old_cat WHERE item_id=$item_id;";
    $res = $db->query($str);
    $str = "UPDATE items SET category='$category', org_loc='$org_loc', curr_loc='$curr_loc' WHERE id=$item_id;";
    $res = $db->query($str);
    
    switch($category) {
    case 'electronics':
        $str = "INSERT INTO desc_electronics VALUE($item_id, '$status', '$item_type', '$name', '$brand', '$color', '$detail');";
        break;
    case 'clothing':
        $str = "INSERT INTO desc_clothing VALUE($item_id, '$status', '$item_type', '$brand', '$color', '$size', '$detail');";
        break;
    case 'school_supp':
        $str = "INSERT INTO desc_school_supp VALUE($item_id, '$status', '$item_type', '$name', '$color', '$detail');";
        break;
    case 'personal':
        $str = "INSERT INTO desc_personal VALUE($item_id, '$status', '$item_type', '$detail');";
        break;
    case 'misc':
        $str = "INSERT INTO desc_misc VALUE($item_id, '$status', '$item_type', '$name', '$detail');";
        break;
    }
    $res = $db->query($str);
}

if($res == false){
    print "Error updating, please try again";
}
else {
    header('Location: ./landing.php');
}
?>