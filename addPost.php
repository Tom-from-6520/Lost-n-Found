<html>
<head>

<?php 
session_start();
include("bootstrap.php");

$uid = $_SESSION['uid'];
if ($uid == '') {
    header('Location: ./login.php');
}
$op = $_GET['op'];
$title = "";
$header = "";
$placeholder = "";
$currLocQues = "";
if ($op == 'lost') {
    $title = "Lost";
    $header = "Lost Location";
    $placeholder = "Where did you lose it?"; 
}
else if ($op == 'found') {
    $title = "Found";
    $header = "Found Location";
    $placeholder = "Where did you find it?"; 
    $currLocQues = "<tr><td>Current Location</td>" . 
    "<td><input type='text' name='currLoc' placeholder='Where is it now?' required/></td><tr>";
} 
else {
    header('Location: ./landing.php');
}

print "<title> $title Form </title>";

?>


<style>
.space-row{
	height:150px;
}
.fine-print {
    font-size:10; 
    margin-top:5px;
    margin-bottom:0px;
}
</style>

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
    populateBrand();
    populateColor();
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Phone, Tablet, Laptop, etc. </p></td>"; 
    document.getElementById("clothing_size").innerHTML = "";
}

function clothingForm() {
    populateBrand();
    populateColor();
    document.getElementById("name").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: T-shirt, Sweater, Jeans, etc. </p></td>";
    document.getElementById("clothing_size").innerHTML = "<td>Clothing size</td><td><input type='text' name='tfSize' placeholder='enter text' required></td>";
}

function suppliesForm() {
    populateName();
    populateColor(); 
    document.getElementById("item_type").innerHTML = "<td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Textbook, Calculator, Notebook etc. </p></td>";
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
}

function personalForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
    document.getElementById("color").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='What is the type of the personal item?' required/>" + 
    "<p class='fine-print'> *Example: IDs, keys, licenses, passports, etc. </p></td></tr>";
}

function miscForm() {
    populateName();
    document.getElementById("brand").innerHTML = "";
    document.getElementById("clothing_size").innerHTML = "";
    document.getElementById("color").innerHTML = "";
    document.getElementById("item_type").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Medicine, Water Bottle, Ukulele, etc. </p></td></tr>";
}

function populateName() {
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' placeholder='enter text' required></td>";
}


function populateBrand() {
    document.getElementById("brand").innerHTML = "<td>Brand</td><td><input type='text' name='tfBrand' placeholder='enter text' required></td>";
}


function populateColor() {
    document.getElementById("color").innerHTML = "<td>Color</td><td><input type='text' name='tfColor' placeholder='enter text' required></td>";
}

</script>

</head>
<body bgColor="#FFFFFF">
<div class="space-row"></div>

<div class='row'>
<div class='col-md-8'>
<h2 align='center'><?php echo $title ?> Item</h2>
</div>
<div class='col-md-4'>
<a href='./landing.php'>Cancel</a>
</div>
</div> 

<form name='foundFm' method='POST' action='addPost_process.php?op=<?php print $op?>'>


<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<select name='ddlCat' id='ddlCat' onchange="changeForm()" required>
<option value='electronics'>Electronics</option>
<option value='clothing'>Clothing</option>
<option value='school_supp'>School Supplies</option>
<option value='personal'>Personal</option>
<option value='misc'>Miscellaneous</option>
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
print "<tr><td>$header</td>";
print "<td><input type='text' name='orgLoc' placeholder=$placeholder/ required></td></tr>";
print $currLocQues;
?>

<tr>
<td>Description of the item</td>
<td><textarea name="taDetail" placeholder="enter your description" rows="5" cols="60" required></textarea></td>
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
electronicsForm();
</script>
</div>
</form>

</body>
</html>