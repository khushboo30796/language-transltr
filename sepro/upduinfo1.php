<?php
include "connection.php";
$fid=$_COOKIE["fid"];
$q1="select * from faculty where fid ='".$fid."';";
$r1=$conn->query($q1);
$arr=$r1->fetch_assoc();
?>
<p align='right'><a href="loginhome1.php"> Home</a></p>
<center>
<h2>Indian Institute of Technology Indore</h2>
<h1>KSHIP</h1>
<h3>Edit user details</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>	
<?php
$flag=0;

$n=$_POST['name'];
$d=$_POST['dept'];
$e=$_POST['email'];

if (isset($_POST['upd']))
{
$q2="update faculty set fname='".$n."', dname='".$d."',email='".$e."' where fid='".$fid."';";
//echo $q2;
$r2=$conn->query($q2);
if($r2)
	{$flag=1;
	echo "Success <br>";
	$lnk='<a href="upduinfo1.php">Go Back</a>';
	echo $lnk;}
else 
	echo "Invalid entries";
}

if($flag==0)
{
$str='<center><form action="upduinfo1.php" method="POST">
<table >
<tr>
	<td>ID</td>
	<td><input type="text"  name="ID" value='.$arr["fid"].' readonly></td>
</tr>

<tr>
	<td>Name</td>
	<td><input type="text" name="name" value="'.htmlspecialchars($arr["fname"]).'""></td>
</tr>

<tr>
	<td>Department</td>
	<td><input type="text" name="dept" value='.$arr["dname"].'></td>
</tr>

<tr>
	<td>Email</td>
	<td><input type="text" name="email" value='.$arr["email"].' ></td>
</tr>
</table>
<input type="submit" name="upd" value="Update">
</form>
</center>';
echo $str;
}




?>



