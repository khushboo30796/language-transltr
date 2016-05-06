<?php
include "connection.php";

?>
<p align="right"><a href="adminhome.php">Home</a></p>
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h3>Research Paper Portal</h3>
<h3>New User</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>	

<form action="signup1.php" method= "post">
<table>
<th colspan="2">Signup</th>
<tr>
	<td>Username:</td>
	<td><input type="text" name ="uname"></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name ="pwd"></td>
</tr>
<tr>
	<td>Enter password again:</td>
	<td><input type="password" name ="pwd2"></td>
</tr>
</table>
<input type="submit" name="sub" value="sign up">
</form>





