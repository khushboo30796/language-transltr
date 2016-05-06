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

<?php
echo "<center>";
if(isset($_POST['sub']))
{
$un=$_POST['uname'];
$pw2=$_POST['pwd2'];
$pw=$_POST['pwd'];
if($pw2==$pw)
{
   $pw = md5($pw);
   $q = "INSERT INTO users VALUES ('".$un."','".$pw."','Enter Name','Enter email','Enter phone no.','Enter Institute');";
  // echo $q;
   $r=$conn->query($q);
//   echo "<br>Hi";
   if($r)
   	{echo "Success<br>";
	echo "<a href='signup.php'>Go back</a>";
	}
  else
	{echo "Invalid Entries<br>";
	echo "<a href='signup.php'>Go back</a>";
	}
}
else
	{
	echo "Your passwords don't match.";
	echo "<br><a href='signup.php'>Go Back</a>";
	}
}
?>
