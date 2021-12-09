<!DOCTYPE HTML>
<html>
<head>
<?php
include_once("db_connect.php");
include("landing_util.php");

$id = $_SESSION['uid'];
$name = getName($db, $id);
$title = $name . "'s Inbox";
?>

<title> <?php print $title; ?></title>

<!-- lnk the other stuff here later -->
<link rel="stylesheet" href="profile.css">
</head>

<body>
 <div class = "container">
        <div class = "main">
            <div class="row"> 
                <div class="col-md-4">
                    <div class = " card text-center sidebar">
                        <div class ="card-body">
                            <!-- Insert an image here-->
                            <div class="mt-3">
                                <h3><a href='profile.php'><?php print $name ?></a> </h3>
                                <button type="button"><a href='landing.php'>Home</a></button>
                                <button type="button"><a href='viewInbox.php'>Inbox</a></button>
                                <button type="button"><a href='sendMsg.php'>Message</a></button>
                                <button type="button"><a href='landing.php'>Log Out</a></button>
                            </div>
                        </div>

                    </div>

                </div>       
            </div>
             <div class="card mb-3 content">
                    <h1 class ="m-3"> Inbox </h1>
			<?php
			print "<table border='1' cellspacing='0' cellpadding='10'>";
			print "<tr>";
			print "<th>Received</th>";
			print "<th>From</th>";
			print "<th>Message</th>";
			print "<th>Read</th>";
			print "</tr>";

			$str = "SELECT * FROM message WHERE receiver='$id';";
			$res = $db->query($str);
	
			if($res != FALSE) {
			$nRows = $res->rowCount();
			print "<caption>You have $nRows messages.</caption>";

			while($row=$res->fetch()){
				$date = $row['sent'];
				$from = $row['sender'];
				$seen = $row['seen'];
				$msg = $row['content'];
		
				$name = getName($db, $from);
		
				if($res3 != FALSE) {
					$row4 = $res3->fetch();
					$sender = $row4['name'];
				}
		
				$tRow = "<tr>".
				 	"<td class='td'>$date</td>".
				 	"<td class='td'>$name</td>".
				 	"<td class='td'>$msg</td>".
					"</td class='td'><td>$seen</td>".
					"</tr>\n";
			print $tRow;
			}
	}
			
?>          
	</table>         
    </div>
</body>
</html>

