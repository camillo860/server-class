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

 
function CloseCon($conn)
 {
 $conn -> close();
 }

function addUser($username, $password,$conn)
{
	$sql = "INSERT INTO accounts (username,pass,homedir,active)	VALUES (\"$username\",PASSWORD($password),'/var/www/html/$username',1)";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "<br>Nuovo studente aggiunto con successo al DATABASE";
	} else {
	    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}

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
	
	 
	// creo il file di configurazione
	echo ("<br>File di configurazione FTP creato");
	$path="/etc/vsftpd/user_conf/$username";
	$myfile = fopen($path, "w") or die("Unable to open file!");
	$txt = "dirlist_enable=YES\ndownload_enable=YES \nlocal_root=/var/www/html/$username";
	fwrite($myfile, $txt);
	fclose($myfile);
		
	
}
?>			
