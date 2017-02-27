<?php
 
session_start();
 
$username = $_POST['username'];
$password = $_POST['password'];
 
if ($username&&$password)
{
        $connect = mysql_connect("localhost","root","") or die("Couldn't Connect!");
        mysql_select_db("phplogin") or die("Couldn't Find DB!");
 
        $query = mysql_query("SELECT * FROM users WHERE username='".$username."'");
 
        $numrows = mysql_num_rows($query);
 
        if ($numrows!=0)
        {
               
                while ($row = mysql_fetch_assoc($query))
                {
                        $dbusername = $row['username'];
                        $dbpassword = $row['password'];
                }
 
                // check to see if they match!
                if ($username==$dbusername&&$password==$dbpassword)
                {
                        echo "Your're in! <a href='content.php'>Click</a> here to enter the member page.";
                        $_SESSION['username']=$dbusername;
                }
                else
                        echo "Incorrect password!";
 
        }
        else
                die("That user doesn't exist");
 
}
else
        die("Please enter and username and password!");
?>
