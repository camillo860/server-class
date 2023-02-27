
<?php 
include ("utility.php");
include ("header.php");
include ("checkLogin.php");

$conn= OpenCon();
$result= selectStudent($conn);
echo "<h2> Gestione Admin sul server</h2>";
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border=1><tr><th></TH><TH>COGNOME </TH> <TH> </TH></TR>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src=\"images/b_account.png\" width=24px; /></td><td>" . $row["username"]. "</td><td>";
	if($row["role"]==1){	
echo "<a href=\"abilitaAdmin.php?action=0&id=".$row["id"]."\"><img src=\"images/ok.png\" width=24px; text=\"abilita\" alt=\"abilita\"/> </a></td> ";}
else{
echo "<a href=\"abilitaAdmin.php?action=1&id=".$row["id"]."\"><img src=\"images/plus.png\" width=24px; text=\"abilita\" alt=\"abilita\"/> </a></td> ";
	}
	
	echo "</tr>";
	}
	echo "</table>";
} else {
    echo "Nessuno Admin prensente nel server";
}
?>
<br/> <br/>
<a href="indexAdmin.php"> Homepage </a> <br>
<a href="nuovoStudente.php"> Inserire nuovo studente </a>
<?php include ("footer.php"); ?>

