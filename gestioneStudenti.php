
<?php 
include ("utility.php");
include ("header.php");
include ("checkLogin.php");
?>
<title>
Elenco Studenti abilitati sul server FTP e MySQL
</title>
<body>
<h2>Elenco studenti abilitati sul server FTP e MySQL </h2>
<?php
$conn= OpenCon();
$result= selectStudent($conn);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border=1><tr><th></TH><TH>COGNOME </TH> <TH> PASSWORD </TH><TH></TH></TR>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src=\"images/b_account.png\" width=24px; /></td><td>" . $row["username"]. "</td><td> ***</td> ";
	echo" <td><a href='cancellaStudente.php?id=".$row["id"]."' onclick=\"return confirm('Vuoi cancellare ".$row["username"]."?')\"> CANC </A></td><tr>";
    }
	echo "</table>";
} else {
    echo "Nessuno studente prensente nel server";
}
?>
<br/> <br/>
<a href="indexAdmin.php"> Homepage </a> <br>
<a href="nuovoStudente.php"> Inserire nuovo studente </a>
<?php include ("footer.php"); ?>

