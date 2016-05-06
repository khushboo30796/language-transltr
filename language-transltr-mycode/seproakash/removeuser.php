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
	$q="select * from users";
	echo "<br><form action='removeuser1.php' method ='POST'>";
	$r=$conn->query($q);
	echo "<table border=7><tr><th>Select</th><th>User Name</th><th>Name</th><th>Email ID</th><th>Phone No.</th><th>Institution</th></tr>";
	$flag=0;
	while($arr=$r->fetch_assoc()){
		if($arr['fid']=="admin") continue;
		$flag=1;
		echo "</td><td><input type='checkbox' name='".$arr['fid']."' value='".$arr['fid']."'></td> <td>".$arr['fid']."</td><td>".$arr['name']."</td><td>".$arr['email']."</td><td>".$arr['phno']."</td><td>".$arr['institution']."</td></tr>";
		}
	if ($flag==0)
		echo "Sorry, no matches!";
	echo "</table>";
	echo "<input type='submit' value='delete' name='del'>";
	echo "</form>";
}

	

?>
