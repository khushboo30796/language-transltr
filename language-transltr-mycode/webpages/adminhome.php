<?php
include "connection.php";
?>
<p align='right'>
	<?php
			session_start();
			//echo $_SESSION;
			if(!isset($_SESSION['login'])){
				echo "<a href='login1.php'>&nbspLogin</a><br>";
			}else{
				echo "&nbsp You are logged in as : " . $_SESSION['login'];
				echo "<br><a href='logout.php'>&nbspLogout</a>";
			}
		?>
</p>
<center>
<h2>Indian Institute of Technology Indore</h2>
<h1>KSHIP</h1>
<h3> Login Home</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background-attachment: scroll;
		background-position: 50% 50%;
		background-size: 500px 800px
		">
</body>	
<center>
<?php
if($_SESSION['login']=="admin"){
	echo '<a href="signup.php">Add new user</a><br><br>
	<a href="removeuser.php">Remove users</a><br><br>
	<a href="insert4.php">Add new Research paper</a><br><br>
	<a href="update2.php">Update details of existing paper</a><br><br>
	<a href="upduinfo1.php">Update user details</a><br><br>
	<a href="assigntranslation.php">Assign Translation</a><br><br>
	<a href="publish.php">Publish Translation</a><br><br>';
}

?>
<a href="displaypub2.php">View Research papers</a><br><br>

</center> 
