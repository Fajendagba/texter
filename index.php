        <?php require_once './header.php'; ?>
        <br><span class='main'>Welcome to <?php echo"$appname"?>,
            <?php
            if($loggedin){echo "$user, you are logged in.";}
            else          echo " please sign up and/or log in to join in.";
            ?>
        </span><br><br>
    </body>
</html>