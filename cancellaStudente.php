<?php
include ("utility.php");
include ("checkLogin.php");
//$id=$_GET['id'];
//echo "ID ".$id;

if (!empty($_GET['id'])){
	$id=$_GET['id'];
	$conn=OpenCon();
	deleteStudente($id,$conn);
}
	header("Location: gestioneStudenti.php");
?>
