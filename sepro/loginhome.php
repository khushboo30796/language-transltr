<?php

include "connection.php";

$fid=$_COOKIE["fid"];
$q='select * from faculty where fid='.$fid.';';

$result=$conn->query($q);
$row=$result->fetch_assoc();
?>
<body bgcolor = "Lavender">
<p align = "right"> <a href="login.php">Logout</a></p>
<center>
<h2>Indian Institute Of Technology, Indore</h2>

<br>
<h1>KSHIP</h1>
<br>
<a href = "insert.php">Add new Research Paper</a>
<br><br>
<a href="upduinfo.php">Update User Information</a></p>
<a href="update.php">Update Paper Details </a></p>

</body>
