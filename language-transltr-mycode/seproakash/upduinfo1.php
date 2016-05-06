<?php
	include "connection.php";
	session_start();
	if(time()>$_SESSION['expire']){
		session_unset();
		session_destroy();
	}else{
		$fid=$_SESSION['login'];
		$q1="select * from users where fid ='".$fid."';";
		$r1=$conn->query($q1);
		$arr=$r1->fetch_assoc();
	}
?>

<p align='right'><a href="loginhome1.php"> Home</a></p>
<center>
<h2>Indian Institute of Technology Indore</h2>
<h1>KSHIP</h1>
<h3>Edit user details</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: center;
		background-size: 500px 800px
		">
</body>	

<?php
	$flag=0;
	if($_SESSION['login']==NULL){
		echo "<center>SESSION DESTROYED!!<br>";
		echo "<a href='login1.php'> Login Again </a></center>";
	}else{
		$n=$_POST['name'];
		$ph=$_POST['phno'];
		$e=$_POST['email'];
		$in=$_POST['inst'];
		if(isset($_POST['upd'])){
			if(!preg_match("/^[a-zA-Z ]*$/", $n)){
				echo "Only letters and whitespaces allowed.<br>";
				echo "<a href='upduinfo1.php'>Go back</a>";
			}else if($ph<1000000000 || $ph>9999999999 || !(is_numeric($ph))){
				echo "Invalid Phone number.<br>";
				echo "<a href='upduinfo1.php'>Go back</a>";
			}else if(!strpos($e, '@') || !strpos($e, '.') || strpos($e, '.')<strpos($e, '@')){
				echo "Invalid email address.<br>";
				echo "<a href='upduinfo1.php'>Go back</a>";
			}else{
				$q2="update users set name='".$n."', email='".$e."',phno='".$ph."',institution='".$in."' where fid='".$_SESSION['login']."';";
				$r2=$conn->query($q2);
				if($r2){
					$flag=1;
					echo "Success <br>";
					$lnk='<a href="upduinfo1.php">Go Back</a>';
					echo $lnk;
				}else echo "Invalid entries";
			}
		}else{
			if($flag==0){
				$str='<center><form action="upduinfo1.php" method="POST">
					<table >
						<tr>
							<td><b>Username : </b></td>
							<td><b>'.$_SESSION['login'].'</b></td>
						</tr>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name" value="'.$arr["name"].'"></td>
						</tr>
						<tr>
							<td>Email ID</td>
							<td><input type="text"  name="email" value='.$arr["email"].'></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td><input type="text" name="phno" value='.$arr["phno"].'></td>
						</tr>
						<tr>
							<td>Institution</td>
							<td><input type="text" name="inst" value="'. $arr["institution"] .'" ></td>
						</tr>
					</table>
				<input type="submit" name="upd" value="Update">
				</form></center>';
				echo $str;
			}
		}
	}
?>



