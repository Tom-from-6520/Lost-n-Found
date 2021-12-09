<HTML>
<HEAD>
<?php
session_start();
include_once("db_connect.php");
include("landing_util.php");

$id = $_SESSION['uid'];
$name = '';
$contact = '';
$str = "SELECT * FROM users WHERE id='$id';";
$res = $db->query($str);
if($row = $res->fetch()) {
    $name = $row['fname'] . ' ' . $row['lname'];
    $contact = $row['contact'];
}
?>

<TITLE> <?php print $name . "'s profile" ?> </TITLE>
<!-- lnk the other stuff here later -->
<link rel="stylesheet" href="profile.css">
</HEAD>

<BODY>
    <div class = "container">
        <div class = "main">
            <div class="row"> 
                <div class="col-md-4">
                    <div class = " card text-center sidebar">
                        <div class ="card-body">
                            <!-- Insert an image here-->
                            <div class="mt-3">
                                <h3><a href='profile.php'><?php print $name ?></a></h3>
                                <button type="button"><a href='landing.php'>Home</a></button>
                                <button type="button"><a href='viewInbox.php'>Inbox</a></button>
                                <button type="button"><a href='handleButtons.php?op=sendSelectMsg'>Message</a></button>
                                <button type="button"><a href='logout.php'>Log Out</a></button>
                            </div>
                        </div>

                    </div>

                </div>       
            </div>
            <div class="col-md-8 mt-1"> 
                <div class="card mb-3 content">
                    <h1 class = " m-3 pt-3"> About</h1>
                    <div class=card-body>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Full Name</h5>
                            </div>
                            <div class=" col-md-9 text-secondary">
                                <?php print $name ?>
                            </div>
                        </div>
                        <hr>
                        <div class = "row">
                            <div class="col-md-3">
                                <h5> Contact </h5>

                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php print $contact ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class ="col-md-3">
                                <h5> Phone </h5>
                            </div>
                            <div class"col-mid-9 text-secondary">
                                1123451230
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 content">
                    <h1 class ="m-3"> Recent Post </h1>
                    <?php showPersonalPost($db) ?>
                </div>
            </div>
        </div>
    </div>
<BODY>

</HTML>
