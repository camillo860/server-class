<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "rossi";
 $dbpass = "123456";
 $db = "vsftpd";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connessione Fallita: %s\n". $conn -> error);
 
 return $conn;
 }


function OpenCon2()
 {
 $dbhost = "localhost";
 $dbuser = "rossi";
 $dbpass = "123456";

 $db = "mysql";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connessione Fallita: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
function addStudentMysql($username,$password,$conn){
	$sql="CREATE USER '$username'@'%' IDENTIFIED BY '$password';";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "<br>Nuovo Studente creato con successo sul database";
	} else {
	    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}
	// create database		
	for($i=1;$i<4;$i++){
	
	$sql="CREATE DATABASE ".$username."_".$i.";";
	echo $sql;	
	if ($conn->query($sql) === TRUE) {
	    echo "<br>Nuovo database dello studente creato con successo";
	} else {
	    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}

	// impostati i privilegi per lo studente
	//$sql="GRANT ALL PRIVILEGES ON ".$username."_".$i.".* TO '$username'@'%';";
	$sql="GRANT ALL PRIVILEGES ON *.* TO '$username'@'%';";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "<br>Nuovo database dello studente creato con successo";
	} else {
	    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}
}
	$conn -> close();
}

function addStudent($username, $password,$conn)
{
	$sql = "INSERT INTO accounts (username,pass,homedir,active,role)	VALUES (\"$username\",PASSWORD($password),'/var/www/html/$username',1,0)";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "<br>Nuovo studente aggiunto con successo al DATABASE";
	} else {
	    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}
	$conn -> close();
}

function selectStudent($conn){

	$sql = "SELECT * FROM accounts ORDER BY username ";
	$result = $conn->query($sql);
$conn -> close();
	return $result;
}

function createFolder($username){
	$path="/var/www/html/$username";
	//echo($path);

	 
	if (!@mkdir($path)) {
	    $error = error_get_last();
	    echo $error['message'];
	}else 
		{ echo ("<br>Cartella HTML creata");
		$user_name="vsftpd:nogroup";
		chown($path, $user_name); 
	}

	$path="/home/vsftpd/$username";
//	echo($path);

	if (!@mkdir($path)) {
	    $error = error_get_last();
	    echo $error['message'];
	}else { echo ("<br>Cartella FTP creata");
		$user_name="vsftpd:nogroup";
		chown($path, $user_name); 
	}
	//createFileFTP($username);
	 
	// creo il file di configurazione
	 echo ("<br>File di configurazione FTP creato");
	$path="/etc/vsftpd/user_conf/$username";
	//$path="/home/docente/Pubblici/vsftp_user_conf/$username";

	$myfile = fopen($path, "w") or die("Unable to open file!");
	$txt = "\ndirlist_enable=YES";
	fwrite($myfile, $txt);
	$txt = "\ndownload_enable=YES";
	fwrite($myfile, $txt);
	$txt = "\nlocal_root=/var/www/html/$username";
	fwrite($myfile, $txt);
	fclose($myfile); 
	$user_name="vsftpd";
	$bool=chmod($path, 0755); echo ("<br/>");
echo ($path);
echo ("<br/>");
	if($bool)
		echo ("ok");
		else
		echo ("ko");
echo ("<br/>"); 

$output=shell_exec("/home/docente/Scrivania/attiva_studente.sh");
echo "<br/> responso : <br/>";
echo ($output);
/*	$path="/etc/vsftpd/user_conf/";
	$file_source1="default";	
	$file_source2=$path.$file_source1;
	$user=$path.$username;
echo ($file_source2);
echo("<br>");
echo ($user);
	copy($file_source2,$user );

*/
	
}
/**
function createFileFTP($username){


	$path_default="/etc/vsftpd/user_conf/default/default";

	$path="/etc/vsftpd/user_conf/";
		
	$user=$path.$username;
	echo ($file_source2);
	echo("<br>");
	echo ($user);
	copy($path_default,$user );
	$myfile = fopen($user, "a") or die("Unable to open file!");
	$txt = "local_root=/var/www/html/$username";
	fwrite($myfile, $txt);
	fclose($myfile); 
}
*/

function loginAdministrator($username, $password,$conn){
	$sql = "SELECT * FROM accounts where username='".$username."' and pass=PASSWORD('".$password."') and role=1";
	echo "<br>".$sql;
	$result = $conn->query($sql);
	//	echo "<br>".$result;
        // it return number of rows in the table. 
	if ($result){        
	$row = mysqli_num_rows($result); 	

		if ($row==1)
			{$res=True;} 
		else 
			{$res=False;}
	}
	$conn -> close();
	return $res;

}

function changeRoleAdmin($id,$role,$conn){
$sql = "UPDATE accounts SET  role=".$role." where id=".$id;
	echo "<br>".$sql;
	$result = $conn->query($sql);
	//	echo "<br>".$result;
        // it return number of rows in the table. 
	if ($result){        
	$row = mysqli_num_rows($result); 	

		if ($row==1)
			{$res=True;} 
		else 
			{$res=False;}
	}
	$conn -> close();
	return $res;
}

function deleteStudente($idStudente,$conn){
	$sql="DELETE FROM accounts where id=".$idStudente;
	//echo $sql;
	$result = $conn->query($sql);
	return $result;
}

?>			
