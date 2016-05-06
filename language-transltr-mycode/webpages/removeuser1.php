<?php

include "connection.php";

?>
<p align="right"><a href="adminhome.php">Home</a>  &nbsp; &nbsp;
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h1>KSHIP</h1>
<h3>View Research Papers and Projects</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>

<?php
      session_start();
      //echo $_SESSION;
    ?>

<?php
if($_SESSION['login']=="admin"){
if (isset($_POST['del']))
{
	$q='select fid from users;';
	$r=$conn->query($q);
	$flag=0;
	
	while($arr=$r->fetch_assoc())
		{
		if(isset($_POST[$arr["fid"]]))
			{
			$flag=1;
			$q1="delete from users where fid='".$arr['fid']."';";
			$r1=$conn->query($q1);
			//echo $arr['fid'];
			//echo "<br>";
			}
		}
	if($flag==1)
	echo "Users successfully removed, Good riddance!<br><a href='removeuser.php'> Go Back</a>";
	else
	echo "No User removed!<br><a href='removeuser.php'> Go Back</a>";
	
	
}
}
?>
