<?php

session_start();
include_once("db_connect.php");

$item_id = $_GET['id'];
$category = $_GET['cat'];

$op = $_GET['op'];

$delStr = "DELETE FROM items WHERE id=$item_id;";
	
		$res = $db->query($delStr);
	
		if($res != FALSE){
	
			$delStr2 = "DELETE FROM desc_$category WHERE item_id=$item_id;";
		
			$res2 = $db->query($delStr2);
			
		if($res2 != FALSE){
			if($op == 'landing'){
				header('Location: ./landing.php');	
			}
			else if ($op == 'profile'){
				header('Location: ./profile.php');
			}	
		}
	}
?>


