<html>
<head>

<?php
    include("bootstrap.php");
?>
<TITLE> Found Form </TITLE>

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
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' placeholder='enter text'></td>";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Phone, Tablet, Laptop, etc. </p></td></tr>" + 
    "<tr><td>Brand</td><td><input type='text' name='tfBrand' placeholder='enter text'></td></tr>" +
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text'></td></tr>";
}

function clothingForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: T-shirt, Sweater, Jeans, etc. </p></td></tr>" + 
    "<tr><td>Brand</td><td><input type='text' name='tfBrand' placeholder='enter text'></td></tr>" +
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text'></td></tr>" +
    "<tr><td>Clothing size</td><td><input type='text' name='tfSize' placeholder='enter text'></td></tr>";
}

function suppliesForm() {
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' placeholder='enter text'></td>";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: IDs, keys, licenses, passports, etc. </p></td></tr>" + 
    "<tr><td>Color</td><td><input type='text' name='tfColor' placeholder='enter text'></td></tr>";
}

function personalForm() {
    document.getElementById("name").innerHTML = "";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Medicine, Water Bottle, Ukulele, etc. </p></td></tr>";
}

function miscForm() {
    document.getElementById("name").innerHTML = "<td>Name of the item</td>" +
    "<td><input type='text' name='tfName' placeholder='enter text'></td>";
    document.getElementById("categoryForm").innerHTML = "<tr><td>Item Type</td>" +
    "<td><input type='text' name='tfType' placeholder='enter text'/>" + 
    "<p class='fine-print'> *Example: Medicine, Water Bottle, Ukulele, etc. </p></td></tr>";
}

function clearCatForm() {
    document.getElementById("categoryForm").innerHTML = "";
}
</script>

</head>
<body bgColor="#FFFFFF">

<div class="space-row">

</div>

<h2 align="center">Form for Found Items</h2>

<!-- when submitted, form1.php is executed to 
     handle the form inputs and return the results to user -->

<form name="foundFm" method="POST" action="addPostProcess.php">

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<input type="radio" name="rbCat" value='electronics' id='electronics'>Electronics<br/>
<input type="radio" name="rbCat" value='clothing' id='clothing'>Clothing<br/>
<input type="radio" name="rbCat" value='school_supp' id='school_supp'>School Supplies<br/>
<input type="radio" name="rbCat" value='personal' id='personal'>Personal<br/>
<p class="fine-print"> *Only choose Personal for ids, keys, licenses and passports. </p>
<input type="radio" name="rbCat" value='misc' id='misc'>Miscellaneous
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

<tr>
<td>Found Location</td>
<td><input type="text" name="foundLoc" placeholder="Where did you find it?"/></td>
</tr>

<tr>
<td>Current Location</td>
<td><input type="text" name="currLoc" placeholder="Where is it now?"/></td>
</tr>

<!----CATEGORY SPECIFIC SECTION---->

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;" id="categoryForm"></table>


<!----DESCRIPTION SECTION---->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: transparent 1px !important;">
<tr>
<td>Description of the item</td>
<td><textarea name="taDetail" value="" rows="5" cols="60"></textarea></td>
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