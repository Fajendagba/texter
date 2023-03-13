<?php
require_once './header.php';

$error = $user = $pass = "";

if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "") {
        $error = "Not all fields were entered<br>";
    } else {
        $result = queryMysql("
                SELECT user,pass FROM members 
                WHERE user ='$user' AND pass='$pass'");
        if ($result->num_rows == 0) {
            $error = "<span class='error'>Username/Password invalid</span><br><br>";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            die("You are now logged in. Please <a href='members.php?view=$user'>click here</a> to continue.<br><br>");
        }
    }
}
?>
<div class='main'><h3>Please enter your details to log in</h3>
<form method='post' action='login.php'><?php echo "$error"?>
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='16' name='user' value='<?php $user?>'><br>
    <span class='fieldname'>Password</span>
    <input id='pass' maxlength='16' name='pass' value='<?php $pass?>'><br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
</form></div><br>
</body>
</html>