<?php
session_start();?>
<!DOCTYPE html>
<html>
    <head><?php
    require_once './functions.php';
    $userstr = ' (Guest)';
    
    if(isset($_SESSION['user']))
    {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = " ($user)";
    } else { $loggedin = FALSE; }?>
        <title><?php echo "$appname$userstr"?></title>
        <?php include ('styles.php');?>
        <?php include ('javascript.php');?>
<!--        <link rel='stylesheet' href='styles.php'>
    	<script src='javascript.php'></script>-->
    </head>
    <body>
    <center>
        <canvas id='logo' width='624' height='96'>
            <?php echo "$appname"?>
        </canvas>
    </center>
    <div class='appname'><?php echo "$appname$userstr"?></div>
    <?php if($loggedin) {?>
    <br> 
    <div class="navbar navbar-default" role="navigation">
        <div id='container'>
            <ul class='nav navbar-nav menu'>
                <li><a href='members.php?view=<?php echo "$user";?>'>Home</a></li>
                <li><a href='members.php' >Members</a></li>
                <li><a href='friends.php' >Friends</a></li>
                <li><a href='messages.php'>Messages</a></li>
                <li><a href='profile.php' >Edit Profile</a></li>
                <li><a href='logout.php'  >Log out</a></li>
            </ul>
        </div>
    </div>
    <br>
    <?php }
    else {?>
    <br>
    <div class="navbar navbar-default" role="navigation">
        <div id='container'>
            <ul class='nav navbar-nav menu'>
                <li><a href='index.php' >Home</a></li>
                <li><a href='signup.php'>Sign up</a></li>
                <li><a href='login.php'>Log in</a></li>
            </ul>
        </div>
    </div><br>
    <span class='info'>
        &#8658; You must be logged in to view this page.
    </span><br><br>
    <?php }?>