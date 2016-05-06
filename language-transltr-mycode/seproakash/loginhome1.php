<?php
	include "connection.php";
?>
<p align='right'>
	<?php
			session_start();
			if(!isset($_SESSION['login'])){
				echo "<a href='login1.php'>&nbspLogin</a><br>";
			}else if(time()>$_SESSION['expire']){
				session_unset();
				session_destroy();
				echo "Session destroyed.<br>";
				echo "<a href='login1.php'>&nbsp Login again</a>";
			}else{
				//echo $_SESSION;
				echo "&nbsp Hello " . $_SESSION['login'];
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
		background-position: center;
		background-size: 500px 800px
		">
</body>	
<center>
	<?php
		if($_SESSION['login']=="admin"){
			echo '<a href="signup.php">Add new user</a><br><br>
				<a href="removeuser.php">Remove users</a><br><br>';
		}
	?>

	<?php
		if($_SESSION['login']){
			echo '<a href="insert4.php">Add new Research paper</a><br><br>
			<a href="update2.php">Update details of existing paper</a><br><br>
			<a href="upduinfo1.php">Update user details</a><br><br>';
		}
	?>

		<a href="displaypub2.php">View Research papers</a><br><br>
	<?php
		if($_SESSION['login'])
			//echo '<a href="translate.php">I want to translate(....)</a><br><br>';
	?>

</center> 
