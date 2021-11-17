<?php	
	session_start();
	include('submitFound.php');
	include_once('db_connect.php');
	
	print "Form has been submitted \n";
	print "</ br>";
	print " <a href=./landing.php>Go back to dashboard</a>";
	
	function submitFound($db, $id){
		$name = $_POST['tfName'];
		$item_type= $POST['itemtpe'];
		$status=$'F';
		$category=_$POST['ddl'];
		$cur_loc=$_POST['curLoc'];
		$org_loc=$_POST['foundLoc'];
		$description = $_POST['tArea'];
		$date = date('Y-m-d h:i:s', time());
		
		//NEED TO ASK ABOUT POSTER ID AND HOW TO GET FROM SESSION
		
		$str = "INSERT INTO items(status, category, org_loc, cur_loc, poster_id, org_date)"
		."VALUE('F', $category, $org_loc, $cur_loc, $_SESSION['uid'], $date);";
		
		$addItem = $db->query($str);
		
		if($addItem == FALSE){
			print "Error adding item";
		} 
		
		if ($category = 'Electronics'){
			$addE = "INSERT INTO desc_electronics("
		}
		else if ($category = 'Clothing'){
		
		}
		else if ($category = 'School Supplies'){
		
		}
		else if ($category = 'Personal'){
		
		}
		else if ($category = 'Miscellaneous'){
		
		}
	}
	
	
?>
