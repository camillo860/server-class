<?php
include("utility.php");

echo "SESSIONE!!";
$user=$_POST["usr"];
$psw=$_POST["psw"];
echo "user -";
echo $_POST['usr'];
if ((!empty($_POST['usr'])) && (!empty($_POST['psw']))){
	$user=$_POST['usr'];
	$psw=$_POST['psw'];

	$conn=OpenCon();
	$result=loginAdministrator($user,$psw,$conn);		
	if ($result){
		session_start();
		$_SESSION["usr"]=$usr;
		header("Location: indexAdmin.php");
	}
	else { 
		echo "Errore Login <a href=\"login.php\">Login Page </a>";
	}
}
?>
