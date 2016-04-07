<?php

include "connection.php";

?>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
<p align='right'><a href="displaypub3.php">View papers</a></p>
<center>
<h2>Indian Institute of Technology Indore</h2>
<h1>KSHIP</h1>
<h3><a href="displaypub3.php">View Research Papers</a></h3>
<form action="login1.php" method= "post">
<table>
<th colspan="2">login</th>
<tr>
	<td>Username:</td>
	<td><input type="text" name ="uname"></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name ="pwd"></td>
</tr>
</table>
<input type="submit" name="sub" value="sign in">
</form>


</body>

<?php
$un=$_POST['uname'];
$pw=$_POST['pwd'];
$pw=md5($pw);
$q="select fid from users where fid='".$un."' and password='".$pw."';";
$r=$conn->query($q);
$flag=0;
while($arr=$r->fetch_assoc())
	{
	//echo $arr['fid'];
	$flag=1;
	}
if($flag==0 and isset($_POST['sub']))
	echo "Incorrect username or password";
else if($flag==1 and isset($_POST['sub']))
	{
	echo "valid entry";
	//$cookie_name="fid";
	//$value=$_POST['uname'];
	//setcookie($cookie_name,$value);
	session_start();
	$_SESSION['login']=$un;
	echo $_SESSION['login'];
	if($un=="admin")
	header("Location: adminhome.php");
	else
	header("Location: loginhome1.php");
	}
?>

