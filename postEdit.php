<!DOCTYPE HTML>
<html>

<head>
<?php
session_start();
include("bootstrap.php");
include("landing_util.php");
include_once("db_connect.php");
?>
<h3> Edit your post </h3>
</head>

<body>
<?php
$item_id = $_GET['id'];
 $str = "SELECT * FROM items WHERE id=$item_id;";
    $res = $db->query($str);
     
    if($res != false){
            $row = $res->fetch();
            $poster_id = $row['poster_id'];
            $category = $row['category'];
            $found_loc = $row['org_loc'];
            $cur_loc = $row['curr_loc'];
        }
    else {
    	print "<h3> Error fetching query </h3>";
    }

 $str2 = "SELECT * FROM items JOIN desc_$category ON id=item_id WHERE id=$item_id;";
            $res_row = $db->query($str2);
            
            if($res_row != false){
            $row_full = $res_row->fetch();
            $detail = $row_full['detail'];
            $itemName = $row_full['name'];
            $itemType = $row_full['item_type'];
            $brand = $row_full['brand'];
            $color = $row_full['color'];
           }
           
           if($res_row == false){
           	print "<h3> Error with query </h3>";
           }
           
?>   
<form action='updateForm.php?id=<?php print $item_id; ?>' method='POST'>
<table align="center" border='1' cellspacing='0' cellpadding='4' 
       style="border: solid 1px !important">

<tr>
<td>Name of the item</td>
<td><input type='text' name='UtfName' placeholder=<?php print $itemName; ?>></td>
</tr>

<tr>
<td>Item Type</td>
<td><input type='text' name='Uitemtype' placeholder=<?php print $itemType; ?>> <p style='font-size:10; margin-top:5px;'> *Example: Phone, Medicine, Driver License. </p></td>
</tr>";

<tr>
<td>Category</td>
<td>
<select name='Uddl'>
<option value='<?php print $category; ?>'><?php print $category; ?></option>
<option value='electronics'>Electronics</option>
<option value='clothing'>Clothing</option>
<option value='school_supp'>School Supplies</option>
<option value='personal'>Personal</option>
<option value='misc'>Miscellaneous</option>
</select>
<p style="font-size:10px; margin-top:5px;"> *Only choose Personal for ids, keys, licenses and passports. </p>
</td>
</tr>

<tr>
<td>Found Location</td>
<td><input type='text' name='UfoundLoc' placeholder="<?php print $found_loc; ?>"></td>
</tr>

<tr>
<td>Current Location</td>
<td><input type='text' name='UcurLoc' placeholder=<?php print $cur_loc; ?>></td>
</tr>

//<!---------ELECTRONIC SPECIFIC SECTION----------------------->
//<!-- row 3: electronic specific brand-->
<tr>
<td>Brand</td>
<td><input type='text' name='UtfBrand' placeholder="<?php print $brand; ?>"></td>
</tr>
<tr>
<td>Color</td>
<td><input type='text' name='UtfColor' placeholder="<?php print $color; ?>"></td>
</tr>

//<!--------------------------------------------------->


<tr>
<td>Description of the item</td>
<td><textarea name='UtArea' value='' placeholder="<?php print $detail; ?>" rows='5' cols='60'></textarea></td>
</tr>

</table>

</br>
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-2'>
<input type='submit' value="Submit Updated Form"/>
</div>
</div>
</form>

</body>
</html>