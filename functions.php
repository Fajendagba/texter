<?php
$dbhost  = 'localhost';
$dbname  = 'texter';
$dbuser  = 'root';
$dbpass  = '';
$appname = 'Texter';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($connection->connect_error)
{
    die($connection->connect_error);
}

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query) 
{
    global $connection;
    $result = $connection->query($query);
    if(!$result)
    {
        die($connection->connect_error);
    }
    return $result;
}

function destroySession()
{
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(), '', time()-2592000, '/');
    }
    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripcslashes($var);
    return $connection->real_escape_string($var);
}


/**
 * (Code for Social Network)<br/>
 * <p>First check if an image exist then display it</p><br>
 * <p>Then check for the user's about me text</p>
 * @param string $user <p>
 * Current user.
 */
function showProfile($user)
{
    if (file_exists("$user.jpg"))
    {
        echo "<img src='$user.jpg' style='float:left;'>";
    }
    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
    
    if ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']). "<br style='clear:left;'><br>";
    }
}

?>
