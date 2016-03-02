<?php

$h='localhost';
$u='root';
$p='ramesh';
$d='portal';

$conn=new mysqli($h,$u,$p,$d);

?>

<body bgcolor="Lavender">
<p align="right" bgcolor="Blue"><a href="welcome.html">Portal</a></p> 	
<center>
<h2>Indian Institute Of Technology, Indore</h2>

<br>
<h4>R&D Center</h4>
<br><br>
<form action="login.php" method="post">
<table border=1>
<th colspan=2>Login</th>
<tr>
	<td>Username :</td>
	<td><input type="text" name="uname"></td>
</tr>
<tr>
	<td>Password :</td>
	<td><input type="password" name="pwd"></td>
</tr>
	
</table>
<input type="submit" name="submit" value="Sign In">
</form>


<?php

$n=$_POST["uname"];
$pw=$_POST["pwd"];

$sql="Select fid from users where fid='".$n."' and password='".$pw."';";
$result=$conn->query($sql);
$flag=0;
while($row=$result->fetch_assoc())
	$flag=1;
	
if($flag==0 and isset($_POST["submit"]))
	echo "Password or username is wrong \n";
else if($flag==1 and isset($_POST["submit"]))
{	/*$ch = curl_init("localhost/portal/modify.php");
	curl_exec($ch);
	file_get_contents('localhost/portal/modify.php'); */
	
	$cookie_name="fid";
	$value=$_POST["uname"];
	setcookie($cookie_name,$value);
	header("Location: loginhome.php");	
}	
		

?>


</center>

</body>

















