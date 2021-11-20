<?php
session_start();
include("bootstrap.php");
include("proj_util.php");
include_once("db_connect.php");

print "<h3> Edit your post </h3>";

print "<form action='updateForm.php' method='POST'>";

 $str = "SELECT * FROM items ORDER BY org_date DESC;";
    $res = $db->query($str);
     
    if($res != false){
            $row = $res->fetch();
            $item_id = $row['id'];
            $poster_id = $row['poster_id'];
            $category = $row['category'];
            $name = getName($db, $poster_id); 
            $found_loc = $row['org_loc'];
            $cur_loc = $row['curr_loc'];
        }
    
    if($res == false){
    	print "<h3> Error fetching query </h3>";
    }

 $str2 = "SELECT * FROM (SELECT * FROM items WHERE id=$item_id) AS I JOIN desc_$category ON id=$item_id;";
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

print "<table align='center' border='1' cellspacing='0' cellpadding='4' 
       style='border: solid 1px !important'>";

print "<tr>
<td>Name of the item</td>
<td><input type='text' name='UtfName' placeholder=$itemName></td>
</tr>";

print "<tr>
<td>Item Type</td>
<td><input type='text' name='Uitemtype' placeholder=$itemType> <p style='font-size:10; margin-top:5px;'> *Example: Phone, Medicine, Driver License. </p></td>
</tr>";

print "<tr>
<td>Category</td>
<td>
<select name='Uddl'>
<option value='UddlC1'>$category</option>
<option value='UddlC2'>Electronics</option>
<option value='UddlC3'>Clothing</option>
<option value='UddlC4'>School Supplies</option>
<option value='UddlC5'>Personal</option>
<option value='UddlC6'>Miscellaneous</option>
</select>
<p style='font-size:10; margin-top:5px;'> *Only choose Personal for ids, keys, licenses and passports. </p>
</td>
</tr>";

print "<tr>
<td>Found Location</td>
<td><input type='text' name='UfoundLoc' placeholder= $found_loc></td>
</tr>";

print"<tr>
<td>Current Location</td>
<td><input type='text' name='UcurLoc' placeholder=$cur_loc></td>
</tr>";

//<!---------ELECTRONIC SPECIFIC SECTION----------------------->
//<!-- row 3: electronic specific brand-->
print "<tr>
<td>Brand</td>
<td><input type='text' name='UtfBrand' placeholder='$brand'></td>
</tr>
<tr>
<td>Color</td>
<td><input type='text' name='UtfColor' placeholder='$color'></td>
</tr>";

//<!--------------------------------------------------->


print "<tr>
<td>Description of the item</td>
<td><textarea name='UtArea' value='' placeholder='$detail' rows='5' cols='60'></textarea></td>
</tr>";

print "</table>";

print "</br>
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-2'>
<input type='submit' value='Submit Updated Form'/>
</div>
</div>
</form>";

?>
