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
	 

           if(isset($_POST["up"]))
           {
           		$uq='update journal set jname="'.$_POST["jname"].'",title="'.$_POST["title"].'",acad_year="'.$_POST["acadyear"].'",pub_year='.$_POST["pubyear"].',issue='.$_POST["issue"].',vol='.$_POST["vol"].',pg_start='.$_POST["pgstart"].',pg_end='.$_POST["pgend"].',url="'.$_POST["url"].'",author_name="'.$_POST["auth"].'" where title="'.$t.'";';
           		$res3=$conn->query($uq);
           		if($res3)
           		{
           			echo "<br> Success <br>";
           		}
           		else
           		{
           			echo "Invalid Entries<br>";
				echo "<a href='update5.php'>Go back</a>";
           		}
           }
        }
        


?> 


