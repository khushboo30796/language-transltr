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
	 if(isset($_POST["upd"])
        { 
          echo '<form action="update6.php" method="POST" >';
            $q='select * from journal where title="'.$_POST["title"].'";';
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            
            $tb2='<table > <tr> <td> jname </td> <td> <input type="text" name="jname" value="'.$row[0].'" > </td> </tr> <tr> <td> title </td> <td> <input type="text" name="title" value="'.$row[1].'" readonly> </td> </tr>
          <tr> <td> acad yr </td> <td> <input type="text" name="acadyear" value="'.$row[2].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyear" value="'.$row[3].'" > </td> </tr>
          <tr> <td> issue </td> <td> <input type="text" name="issue" value="'.$row[4].'" > </td> </tr>
          <tr> <td> vol </td> <td> <input type="text" name="vol" value="'.$row[5].'" > </td> </tr>
          <tr> <td> pg start </td> <td> <input type="text" name="pgstart" value="'.$row[6].'" > </td> </tr>
          <tr> <td> pg end </td> <td> <input type="text" name="pgend" value="'.$row[7].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="url" value="'.$row[8].'" > </td> </tr>
          <tr> <td> Author </td> <td> <input type="text" name="auth" value="'.$row[9].'" > </td> </tr>
           </table> ';

           	echo "<br>".$tb2."<br>";
           	echo "<input type='submit' name='up' value='Update'>";
        	echo "</form>";
           }	

        


?> 


