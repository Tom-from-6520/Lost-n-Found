<HTML>
<HEAD>

<?php
	include("bootstrap.php");
?>
<TITLE> Found Form </TITLE>

<style>
	.space-row{
		height:150px;
	}
</style>

</HEAD>
<body bgColor="#FFFFFF">

<div class="space-row">

</div>

<h2 align="center">Form for Found Items</h2>

<!-- when submitted, form1.php is executed to 
     handle the form inputs and return the results to user -->

<form name="foundFm" method="POST" action="fmProcess.php">

<table align="center" border="1" cellspacing="0" cellpadding="4" 
       style="border: solid 1px !important;">


<!-- row 1: Name of item -->
<tr>
<td>Name of the item</td>
<td><input type="text" name="tfName" placeholder="enter text"></td>
</tr>

<tr>
<td>Item Type</td>
<td><input type="text" name="itemtype" placeholder="enter text"/> <p style="font-size:10; margin-top:5px;"> *Example: Phone, Medicine, Driver License. </p></td>
</tr>

<!-- row 2: drop down category -->
<tr>
<td>Category</td>
<td>
<select name="ddl">
<option value="ddlC1">Electronics</option>
<option value="ddlC2">Clothing</option>
<option value="ddlC3">School Supplies</option>
<option value="ddlC4">Personal</option>
<option value="ddlC4">Miscellaneous</option>
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
<td><input type="text" name="curLoc" placeholder="Where is it now?"/></td>
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
<td><textarea name="tArea" value="" rows="5" cols="60"></textarea></td>
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
</HTML>
