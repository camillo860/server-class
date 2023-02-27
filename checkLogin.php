<?php
session_start();
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==True))
{			 header("Location: login.php"); 
		//echo "true";
} 
else {
	$user=$_SESSION["user"];
	echo "Login come - <B> ".$user."</B><br/><br/>";
}
?>
