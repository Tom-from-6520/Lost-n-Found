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
</style>

</head>
<body bgColor="#FFFFFF">

<div class="space-row">

</div>

<h2 align="center">Form for Found Items</h2>

<!-- when submitted, form1.php is executed to 
     handle the form inputs and return the results to user -->

<form name="foundFm" method="POST" action="addPostProcess.php">

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: solid 1px !important;">


<!-- row 1: Name of item -->
<tr>
<td>Name of the item</td>
<td><input type="text" name="tfName" placeholder="enter text"></td>
</tr>

<tr>
<td>Item Type</td>
<td><input type="text" name="tfType" placeholder="enter text"/> <p style="font-size:10; margin-top:5px;"> *Example: Phone, Medicine, Driver License. </p></td>
</tr>

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<select name="ddl">
<option value='electronics'>Electronics</option>
<option value='clothing'>Clothing</option>
<option value='school_supp'>School Supplies</option>
<option value='personal'>Personal</option>
<option value='misc'>Miscellaneous</option>
</select>
<p style="font-size:10; margin-top:5px;"> *Only choose Personal for ids, keys, licenses and passports. </p>
</td>
</tr>

<tr>
<td>Found Location</td>
<td><input type="text" name="foundLoc" placeholder="Where did you find it?"/></td>
</tr>

<tr>
<td>Current Location</td>
<td><input type="text" name="currLoc" placeholder="Where is it now?"/></td>
</tr>

<!---------ELECTRONIC SPECIFIC SECTION----------------------->
<!-- row 3: electronic specific brand-->
<tr>
<td>Brand</td>
<td><input type="text" name="tfBrand" placeholder="enter text"></td>
</tr>
<tr>
<td>Color</td>
<td><input type="text" name="tfColor" placeholder="enter text"></td>
</tr>

<!--------------------------------------------------->


<!-- row 3: description-->
<tr>
<td>Description of the item</td>
<td><textarea name="taDetail" value="" rows="5" cols="60"></textarea></td>
</tr>



<!-- row 8: drop down list, multiple choice -->
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
<input type="reset" value="Clear Form" />
</div>
</div>
</form>

</body>
</html>