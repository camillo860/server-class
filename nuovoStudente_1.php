<?php include "header.php";?>
<h2>Inserimento studente </h2>
<div style="margin-left:20px; margin-top:20px;">
<form action="ins_studente.php" method="post">
	Cognome<br> 
	<input type="text" name="cognome"><br>
	Password<br>
  	<input type="password" id="pwd" name="pwd" ><i> password di defautl "123456"<br><br>
	<input type="reset">&nbsp;&nbsp;<input type="submit" text="Invio">
</form>
</div>
<?php include "footer.php";?>
