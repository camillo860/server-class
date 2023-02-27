
<?php
include 'utility.php';
include 'header.php';
$password="123456";
if (!empty($_POST["password"])){
	$password=$_POST["password"];
	}

if (!empty($_POST["cognome"])){
	$cognome= $_POST["cognome"];
	echo "<h2> STUDENTE $cognome</H2>";
	//echo ("cognome studente");
	//echo ($_POST["cognome"]);	
	  createFolder($cognome);
	// CREAZIONE DELLA CONNESSIONE AL DATABASE
	$con= OpenCon();
	//echo "connected successfully";
	addStudent($cognome,$password,$con);
	// CloseCon($conn);
	echo "MySQL <BR/>";
	$conn=OpenCon2();
	addStudentMysql($cognome,$password,$conn);

	//CloseCon($conn2);
	}
else { echo "Paramentro COGNOME non impostato";}

?><BR/><BR/><BR/>
<a href="nuovoStudente.php">TORNA INDIETRO </a>

<?php include 'footer.php'; ?>
