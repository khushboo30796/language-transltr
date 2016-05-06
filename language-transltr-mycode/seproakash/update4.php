<?php

include "connection.php";

?>


<p align="right"><a href="loginhome1.php">Home</a>  &nbsp; &nbsp;
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h1>KSHIP</h1>
<h3>Update Research Paper Details.</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>		
<?php



	
		$op='<form action="update5.php" method="post"> ';
        echo $op;
        echo "<br>";
        
        echo '<td>Pick Title: <select name="title">';
	$sql="select title from journal ;";
	$res=$conn->query($sql);
	while($row=$res->fetch_assoc())
	{
	echo "<option value='".$row['title']."'>".$row['title']."</option>";
	}
	echo '</select></td> '; 
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
        echo "</form>";
        
        
        
       
    
?> 


