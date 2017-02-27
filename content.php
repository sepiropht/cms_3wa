<?php
 
session_start();
 
if (isset($_SESSION['username']))
        echo "Welcome, ".$_SESSION['username']."!<br /><a href='logout.php'>Logout</a>";
else
        die("You must be logged in!");
?>
