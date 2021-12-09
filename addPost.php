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
if ($op == 'lost') {
    $title = "Lost";
}
else if ($op == 'found') {
    $title = "Found";
} 
else {
    header('Location: ./landing.php');
}

print "<title> $title Form </title>";

?>

<title> Found Form </title>

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
function electronicsForm() {
    populateName();
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Phone, Tablet, Laptop, etc. </p></td></tr>" + 
    "<tr><td>Brand</td><td><input type='text' name='tfBrand' placeholder='enter text' required></td></tr>" +
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text' required></td></tr>";
}

function clothingForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: T-shirt, Sweater, Jeans, etc. </p></td></tr>" + 
    "<tr><td>Brand</td><td><input type='text' name='tfBrand' placeholder='enter text' required></td></tr>" +
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text' required></td></tr>" +
    "<tr><td>Clothing size</td><td><input type='text' name='tfSize' placeholder='enter text' required></td></tr>";
}

function suppliesForm() {
    populateName();
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Textbook, Calculator, Notebook etc. </p></td></tr>" + 
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text' required></td></tr>";
}

function personalForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='What is the type of the personal item?' required/>" + 
    "<p class='fine-print'> *Example: IDs, keys, licenses, passports, etc. </p></td></tr>";
}

function miscForm() {
    populateName();
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Medicine, Water Bottle, Ukulele, etc. </p></td></tr>";
}

function populateName() {
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' placeholder='enter text' required></td>";
}

function clearCatForm() {
    document.getElementById("categoryForm").innerHTML = "";
}
</script>

</head>
<body bgColor="#FFFFFF">

<div class="space-row">

</div>

<?php 
print "<h2 align='center'>Form for $title Items</h2>";
print "<form name='foundFm' method='POST' action='addPost_process.php?op=$op'>"; 
?>

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<input type="radio" name="rbCat" value='electronics' id='electronics' required>Electronics<br/>
<input type="radio" name="rbCat" value='clothing' id='clothing' required>Clothing<br/>
<input type="radio" name="rbCat" value='school_supp' id='school_supp' required>School Supplies<br/>
<input type="radio" name="rbCat" value='personal' id='personal' required>Personal<br/>
<p class="fine-print"> *Only choose Personal for ids, keys, licenses and passports. </p>
<input type="radio" name="rbCat" value='misc' id='misc' required>Miscellaneous
</td>
</tr>

<script>
document.getElementById('electronics').addEventListener("click", electronicsForm);
document.getElementById('clothing').addEventListener("click", clothingForm);
document.getElementById('school_supp').addEventListener("click", suppliesForm);
document.getElementById('personal').addEventListener("click", personalForm);
document.getElementById('misc').addEventListener("click", miscForm);
</script>

<!-- row 1: Name of item -->
<tr id='name'>
</tr>

<?php
$header = "";
$placeholder = "";
$currLocQues = "";
if($op == 'lost') {
    $header = "Lost Location";
    $placeholder = "Where did you lose it?"; 
}
else {
    $header = "Found Location";
    $placeholder = "Where did you find it?"; 
    $currLocQues = "<tr><td>Current Location</td>" . 
    "<td><input type='text' name='currLoc' placeholder='Where is it now?' required/></td><tr>";
}

print "<tr><td>$header</td>";
print "<td><input type='text' name='orgLoc' placeholder=$placeholder/ required></td></tr>";
print $currLocQues;
?>

<!----CATEGORY SPECIFIC SECTION---->

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;" id="categoryForm"></table>


<!----DESCRIPTION SECTION---->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">
<tr>
<td>Description of the item</td>
<td><textarea name="taDetail" value="" rows="5" cols="60" required></textarea></td>
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
document.getElementById("clear").addEventListener("click", clearCatForm);
</script>
</div>
</form>

</body>
</html>
