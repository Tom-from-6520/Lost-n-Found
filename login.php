<!DOCTYPE html>
<html>
<head>
<title>Lost N Found Login</title>
<?php 
session_start();
include('bootstrap.php'); 
?>

<link href="login_style.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="container">

<br/><br/>
<div class='row'>
<img class='logo' src='./res/logo.png' alt='logo'>
</div>
<br/>

<div class="row">
<div class="col-md-12 loginWord">
<h2> Log In </h2>
</div>
</div>


<div class="row">

<div class="col-md-12 loginWord">
<form name='loginForm' method='POST' action='login_helper.php'>

<table class='loginForm' align='center' cellspacing='0' cellpadding='4'>
<tr>
<td><input type="text" name="tfName" placeholder="enter login name"></td>
</tr>

<tr>
<td><input type="password" name="pass" placeholder="type your password"></td>
</tr>

<tr align='left'>
<td><input type='checkbox' name='remember[]' value='y'> Remember me?<br/></td>
</tr>

<tr align='left'>
<td> <a href='forgetPass.php'>Forgot Password? </a></td>
</tr>

<tr>
<td><input type='submit' value='Login'/></td>
</tr>

<tr align='right'>
<td>Don't have an account? <a href='register.php'>Register </a></td>
</tr>

</table>
</form>
</div>

</div>
<br/>

</div>
</body>

</html>
