<?php 
include connection.php;
?>

<p align="right"><a href="loginhome1.php">Home</a></p>
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h3>Research Paper Portal</h3>
<h3>Add new publication/patent</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 90%;
		background-size: 500px 800px
		">
</body>	

<?php
      session_start();
      //echo $_SESSION;
    ?>

<?php
echo "<center>";
$t='journal';

		if($t=="journal")
		{
		$str='
	
		<form action ="insert5.php" method="POST" enctype="multipart/form-data">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="Research Paper" readonly></td>
		</tr>
		
		<tr>
			<td>Journal Name:</td><td> <input type= "text" name="jname"></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Author:</td><td> <input type= "text" name="auth"></td>
		</tr>
		<tr>
			<td>Academic Year: </td><td><input type= "text" name="acad_year"></td>
		</tr>
		<tr>
			<td>Year of publication:</td><td> <input type= "text" name="pub_year"></td>
		</tr>
		<tr>
			<td>Issue no.:</td><td> <input type= "text" name="issue"></td>
		</tr>
		<tr>
			<td>Volume:</td><td> <input type= "text" name="vol"></td>
		</tr>
		<tr>
			<td>Starting Page:</td><td> <input type= "text" name="pg_start"></td>
		</tr>
		<tr>
			<td>Ending page:</td><td> <input type= "text" name="pg_end"></td>
		</tr>
		
		<tr>
			<td>Select File:</td><td><input type="file" name="file" size="5000000"></td>
		</tr>
		</table>
		
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
	
		}

?>

		
 
</form>


