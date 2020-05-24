<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_GET['action']) && $_GET['action'] == "logout"){
                Session::destroy();
            }
        ?>
        <div class="adminarea">
			<ul class="adminclass">
				<li>Admin:-<?php echo Session::get('adminName');?></li>
				<li><a href="?action=logout">Logout</a></li>
			</ul>
        </div>
        <div class="clear">
        </div>
        <div class="adminmenu">
            <ul class="menumain">
                <li ><a href="index.php"><span>Dashboard</span></a> </li>
				
                <li><a href="index.php"><span>User Profile</span></a></li>
				
				<li><a href="changepassword.php"><span>Change Password</span></a></li>
								
                <li><a href=""><span>Visit Website</span></a></li>
                 <li><a href="inbox.php"><span>Inbox</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
    