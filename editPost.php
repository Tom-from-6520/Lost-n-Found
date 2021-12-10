<!DOCTYPE HTML>
<html>

<head>
<?php
session_start();
include("bootstrap.php");
include("landing_util.php");
include_once("db_connect.php");
?>

<div style="height:150px;"></div>

<div class='row'>
<div class='col-md-8'>
<center><h3> Edit your post</h3></center>
</div>
<div class='col-md-4'>
<a href='./landing.php'>Cancel</a>
</div>
</div> 

<?php
$item_id = $_GET['id'];
$str = "SELECT * FROM items WHERE id=$item_id;";
$res = $db->query($str);
     
    if($res == false){
    	print "<h3> Error fetching query </h3>";
    }
    else {
        $row = $res->fetch();
        $poster_id = $row['poster_id'];
        $category = $row['category'];
        $org_loc = $row['org_loc'];
        $cur_loc = $row['curr_loc'];
        $status = $row['status'];
        
        $str = "SELECT * FROM items JOIN desc_$category ON id=item_id WHERE id=$item_id;";
            $res_row = $db->query($str);
            
            if($res_row != false){
            $row_full = $res_row->fetch();
            $detail = $row_full['detail'];

            $name = $row_full['name'];
            $item_type = $row_full['item_type'];
            $brand = $row_full['brand'];
            $color = $row_full['color'];
            $clothing_size = $row_full['clothing_size'];
            }
           
           if($res_row == false){
           	print "<h3> Error with query </h3>";
           }
    }
?>   

<script>
function changeForm() {
   var cat = document.getElementById("ddlCat").value;
   switch(cat) {
       case "electronics":
           electronicsForm();
           break;
       case "clothing":
           clothingForm();
           break;
       case "school_supp":
           suppliesForm();
           break;
       case "personal":
           personalForm();
           break;
       case "misc":
           miscForm();
           break;
   } 
}

function electronicsForm() {
    populateName();
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' value='<?php echo $item_type ?>'/>" + 
    "<p class='fine-print'> *Example: Phone, Tablet, Laptop, etc. </p></td>"; 
    populateBrand();
    populateColor();
    document.getElementById("clothing_size").innerHTML = "";
}

function clothingForm() {
    populateBrand();
    populateColor();
    document.getElementById("name").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' value='<?php echo $item_type ?>'/>" + 
    "<p class='fine-print'> *Example: T-shirt, Sweater, Jeans, etc. </p></td>";
    document.getElementById("clothing_size").innerHTML = "<td>Clothing size</td><td><input type='text' name='tfSize' value='<?php echo $clothing_size?>' required></td>";
}

function suppliesForm() {
    populateName();
    populateColor(); 
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' value='<?php echo $item_type ?>'/>" + 
    "<p class='fine-print'> *Example: Textbook, Calculator, Notebook etc. </p></td>";
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
}

function personalForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("color").innerHTML = "";
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' value='<?php echo $item_type ?>' required/>" + 
    "<p class='fine-print'> *Example: IDs, keys, licenses, passports, etc. </p></td></tr>";
}

function miscForm() {
    populateName();
    document.getElementById("color").innerHTML = "";
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' value='<?php echo $item_type ?>'/>" + 
    "<p class='fine-print'> *Example: Medicine, Water Bottle, Ukulele, etc. </p></td></tr>";
}

function populateName() {
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' value='<?php echo $name ?>' required></td>";
}


function populateBrand() {
    document.getElementById("brand").innerHTML = "<td>Brand</td><td><input type='text' name='tfBrand' value='<?php echo $brand ?>' required></td>";
}


function populateColor() {
    document.getElementById("color").innerHTML = "<td>Color</td><td><input type='text' name='tfColor' value='<?php echo $color ?>' required></td>";
}
</script>


</head>

<body>

<form action='editPost_process.php?id=<?php print $item_id;?>' method='POST'>

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<select name='ddlCat' id='ddlCat' onchange="changeForm()" required>
<?php 
$values = array('electronics', 'clothing', 'school_supp', 'personal', 'misc');
$strs = array("Electronics", "Clothing", "School Supplies", "Personal", "Miscellaneous");
$index = array_search($category, $values, false);
$def_value = $values[$index];
$def_str = $strs[$index];
print "<option value='$def_value'>$def_str</option>";
for($i = 0; $i < count($values); $i++) {
    if($i != $index) {
        $value = $values[$i];
        $str = $strs[$i];
        print "<option value='$value'>$str</option>";
    }
}
?>
</select>
</td>
</tr>

<!-- row 1: Name of item -->
<tr id='name'>
</tr>

<tr id='item_type'>
</tr>

<tr id='brand'>
</tr>

<tr id='color'>
</tr>

<tr id='clothing_size'>
</tr>

<?php
if($status == 'F') {
    print "<tr><td>Where did you found this item</td>" .
    "<td><input type='text' name='tfOrgLoc' value='$org_loc' required></td></tr>" .
    "<tr><td>Where is this item currently</td>" .
    "<td><input type='text' name='tfCurLoc' value='$cur_loc' required></td></tr>";
}
else {
    print "<tr><td>Where did you lose this item</td>" .
    "<td><input type='text' name='tfOrgLoc' value='$org_loc' required></td></tr>";
}
?>

<tr>
<td>Description of the item</td>
<td><textarea name="taDetail" value="" rows="5" cols="60" required><?php print $detail ?></textarea></td>
</tr>

<tr>
<td>Add Picture</td>
<td>
<a href="#"> Upload picture </a>
</td>
</tr>

</table>

</br>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-2">
<input type="submit" value="Submit Form"/>
</div>

<div class="col-md-2">
<input type="reset" value="Clear Form" id="clear"/>
</div>

<script>
var category = "<?php print $category ?>";
switch(category) {
case "electronics":
   electronicsForm();
   break;
case "clothing":
   clothingForm();
   break;
case "school_supp":
   suppliesForm();
   break;
case "personal":
   personalForm();
   break;
case "misc":
   miscForm();
   break;
}
</script>

</div>

</form>

</body>
</html>