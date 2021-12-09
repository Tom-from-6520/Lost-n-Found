<html>

<head>
</head>


<body>
<form name="fmMsg" method="POST" action="addMsg.php?op=sendmsg">
</SELECT>

<B>Recipient</B>
<SELECT name="dblReceiver" required>
<?php
$res = $db->query($str);

while($row = $res->fetch()) {
	$id = $row['id'];
	$name = $row['name'];
	
	$tRow = "<option value='$id'>$name</option>\n";
	print $tRow;
}
?>
</SELECT>

<BR /> <BR />
<TEXTAREA name="taContent" required>

</TEXTAREA><BR /> <BR />

<input type="submit" value="Send Message"/>


</form>

</body>

</html>

</body>



</html>

