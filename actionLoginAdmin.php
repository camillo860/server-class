<?php
include("utility.php");
include ("header.php");
if ((!empty($_POST['usr'])) && (!empty($_POST['psw']))){
	$user=$_POST['usr'];
	$psw=$_POST['psw'];

	$conn=OpenCon();
	$result=loginAdministrator($user,$psw,$conn);		
	if ($result){

		session_start();
		$_SESSION["user"]=$user;
		$_SESSION["loggedin"]=True;
		$_SESSION["admin"]=True;
		header("Location: indexAdmin.php");
	}
	else { 
		echo "<br>Errore Login <a href=\"login.php\">Login Page </a>";
	}
}
include ("footer.php");
?>
