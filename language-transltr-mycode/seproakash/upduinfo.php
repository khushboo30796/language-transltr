<?php

include "connection.php";

$fid=$_COOKIE["fid"];
$q='select * from faculty where fid='.$fid.';';

$result=$conn->query($q);
$row=$result->fetch_assoc();
?>
<p align = "right"> <a href="loginhome.php">Home</a></p>
<center>
<h2>Indian Institute Of Technology, Indore</h2>

<br>
<h4>R&D Center</h4>
<br><br>





<?php

$flag=0;

$n=$_POST["name"];
$d=$_POST["dept"];
$e=$_POST["email"];

if(isset($_POST["upd"]))
{
	$q1='update faculty set fname="'.$n.'" where fid='.$fid.';';
	$res=$conn->query($q1);
	//$result=$conn->query($q);
	if($res)
	{
		$q1='update faculty set dname="'.$d.'" where fid='.$fid.';';
		$res=$conn->query($q1);
		if($res)
		{
			$q1='update faculty set email="'.$e.'" where fid='.$fid.';';
			$res=$conn->query($q1);
			if($res)
			{
				$flag=1;
				echo "Success <br>";
				$lnk='<a href="upduinfo.php">Go Back</a>';
				echo $lnk;
			}

		}

	}
	else if($flag==0)
	{
		$flag=0;
		echo "Invalid Entries <br>";
	}
	$row=$result->fetch_assoc();
}
else if($flag==0)
{
$str='<form action="upduinfo.php" method="POST">
<table border=1>
<tr>
	<td>ID</td>
	<td><input type="text"  name="ID" value='.$row["fid"].' readonly></td>
</tr>

<tr>
	<td>Name</td>
	<td><input type="text" name="name" value="'.htmlspecialchars($row["fname"]).'""></td>
</tr>

<tr>
	<td>Department</td>
	<td><input type="text" name="dept" value='.$row["dname"].'></td>
</tr>

<tr>
	<td>Email</td>
	<td><input type="text" name="email" value='.$row["email"].' ></td>
</tr>
</table>
<input type="submit" name="upd" val="Update">
</form>';

echo $str;


}

?>

	
