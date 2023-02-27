<?php include "header.php";?>
 <form action="actionLoginAdmin.php" method="post">
<div id="login">
<table>
<tr>
<td colspan=2><center>
    <img src="images/b_account.png" alt="Avatar" class="avatar"></center>
  </td></tr>
<tr><td>
    <label for="uname"><b>Username</b></label></td><td>
   <input type="text" placeholder="Enter Username" name="usr" required>
</td></tr>
<tr><td> 
    <label for="psw"><b>Password</b></label></td><td>
    <input type="password" placeholder="Enter Password" name="psw" required>
</td></tr>
<tr><td>   
 <button type="reset">Reset </button> </td><td>
	  <button type="submit">Login</button>
</td></tr>
</table>
</div>
</form> 

</div>
<?php include "footer.php"; ?>
