<?php

include "connection.php";

?>
<p align="right"><a href="login1.php">Home</a>  &nbsp; &nbsp;
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

<form action="displaypub2.php" method= "POST">
<table border=1>
<tr><th>Journal Name</th><th>Year of publishing</th></tr>
<tr><td><select name='subject'>
<option value="%">All</option>
<?php
$q="select distinct jname from journal";
$r=$conn->query($q);
while($arr=$r->fetch_assoc()){
	echo "<option value='".$arr['jname']."'> ".$arr['jname']. " </option>";
}
?>
</td>

<td><select name='Year'>

<option value="%">All</option>
<?php
$q="select distinct pub_year from journal";
$r=$conn->query($q);
while($arr=$r->fetch_assoc()){
	echo "<option value='".$arr['pub_year']."'> ".$arr['pub_year']. " </option>";
}
?>
</td>
</tr>
</table>
<input type="submit" value="search" name="l1">
</form>		

<?php
if(isset($_POST['l1']))
	{
	//echo $_POST['subject'],$_POST['type'],$_POST['mark'];
	$q="select * from journal where jname like '".$_POST['subject']."' and pub_year like '".$_POST['Year']."';";
	//echo $q;
	echo "<br>";
	$r=$conn->query($q);
	echo "<table border=7><tr><th>Journal Name</th><th>Title</th><th>Academic Year</th><th>Year of Publishing</th><th>Issue</th><th>Volume</th><th>Page Start</th><th>Page End</th><th>Link</th></tr>";
	$flag=0;
	while($arr=$r->fetch_assoc())
		{$flag=1;
		echo "</td><td>".$arr['jname']."</td><td>".$arr['title']."</td><td>".$arr['acad_year']."</td><td>".$arr['pub_year']."</td><td>".$arr['issue']."</td><td>".$arr['vol']."</td><td>".$arr['pg_start']."</td><td>".$arr['pg_end']."</td><td><a href='".$arr['url']."'>click here</a></td></tr>";
		}
	if ($flag==0)
		echo "Sorry, no matches!";
	echo "</table>";
	}
?>
