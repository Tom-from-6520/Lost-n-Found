
<?php
include_once("db_connect.php");
include_once("landing_util.php");
session_start();

$op = $_GET['op'];
$id = $_SESSION['uid'];


if($op == 'sendmsg'){
  $receiver = $_GET['sendid'];
  
  $name = getName($db, $receiver);
  
  print "<h2>Send Message to $name </h2>";
  
  print "<form name='msgForm' method='POST' action='addMsg.php?sender=$id&receiver=$receiver'>";
  print "<textarea name='taContent'>";
  print "</textarea><br/><br/>";  
  print "<input type='submit' value='Send Message'/>";
  print "</form>";

}

if ($op == 'claim'){

  $item_id = $_GET['id'];
  $curDate = date('Y-m-d h:i:s', time());
  $str = "INSERT INTO claim VALUE('$id', $item_id, 0, '$curDate')";
  
  $res = $db->query($str);
  
  if($res != false){
      header('Location: ./landing.php');
  }
}
?>
