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
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>		
<form action="insert2.php" method="POST">
<select name="type">
<option value="journal">Paper</option>
<option value="book_chapter">Book Chapter</option>
<br>
<input type="submit" name="subm" value="load">
</form>

<?php

?>
