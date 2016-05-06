<?php

include "connection.php";

?>

<body bgcolor="Lavender">
<p align="right"><a href="loginhome.php">Home</a>  &nbsp; &nbsp;
<center><h2>Update Information on Existing Publication/Patent Info.</h2>
<?php
$flag=0;





if(isset($_POST["load"]) || isset($_POST["upd"]) || isset($_POST["up"])){

	$flag=1;
	if($_POST["Type"]=='journal'){
		$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br><br> <input type="submit" name="load" value="Load"><br> ';
        echo $op;
        echo "<br>";
        $t=$_POST["title"];
        $tb='<table border=1>  <tr> <td> title </td> <td> <input type="text" name="title" value="'.$_POST["title"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        
        if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from journal where title="'.$_POST["title"].'";';
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            
            $tb2='<table border=1> <tr> <td> jname </td> <td> <input type="text" name="jname" value="'.$row[0].'" > </td> </tr> <tr> <td> title </td> <td> <input type="text" name="title" value="'.$row[1].'" > </td> </tr>
          <tr> <td> acad yr </td> <td> <input type="text" name="acadyear" value="'.$row[2].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyear" value="'.$row[3].'" > </td> </tr>
          <tr> <td> issue </td> <td> <input type="text" name="issue" value="'.$row[4].'" > </td> </tr>
          <tr> <td> vol </td> <td> <input type="text" name="vol" value="'.$row[5].'" > </td> </tr>
          <tr> <td> pg start </td> <td> <input type="text" name="pgstart" value="'.$row[6].'" > </td> </tr>
          <tr> <td> pg end </td> <td> <input type="text" name="pgend" value="'.$row[7].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="url" value="'.$row[8].'" > </td> </tr>
           </table> ';

           if(isset($_POST["upd"]))
           {
           	echo "<br>".$tb2."<br>";
           	echo "<input type='submit' name='up' value='Update'>";
           }	

           if(isset($_POST["up"]))
           {
           		$uq='update journal set jname="'.$_POST["jname"].'",title="'.$_POST["title"].'",acad_year='.$_POST["acadyear"].',pub_year='.$_POST["pubyear"].',issue='.$_POST["issue"].',vol='.$_POST["vol"].',pg_start='.$_POST["pgstart"].',pg_end='.$_POST["pgend"].',url="'.$_POST["url"].'" where title="'.$t.'";';
           		$res3=$conn->query($uq);
           		if($res3)
           		{
           			echo "<br> Success <br>";
           		}
           		else
           		{
           			echo "Error <br>";
           			//echo $uq."<br>";
           		}
           }
        }
        echo "</form>";

        

	}



/*
	else if($_POST["Type"]=="patent"){
		$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" selected>Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br><br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          
          <tr> <td> patent no </td> <td> <input type="text" name="pno" value="'.$_POST["pno"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        //echo "</form>";

        if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from patents where patent_no='.$_POST["pno"].';';
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            $t=$_POST["pno"];
            
            $tb2='<table border=1> <tr> <td> title </td> <td> <input type="text" name="titlep" value="'.$row[0].'" > </td> </tr>
          <tr> <td> patent no </td> <td> <input type="text" name="pno" value="'.$row[1].'" readonly> </td> </tr>
          <tr> <td> pub date </td> <td> <input type="text" name="pubdate" value="'.$row[2].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearp" value="'.$row[3].'" > </td> </tr>
           </table> ';

           if(isset($_POST["upd"]))
           {
            echo "<br>".$tb2."<br>";
            echo "<input type='submit' name='up' value='Update'>";
           }  

           if(isset($_POST["up"]))
           {
              $uq='update patents set title="'.$_POST["titlep"].'",patent_no='.$_POST["pno"].',acad_year="'.$_POST["acadyearp"].'",pub_date="'.$_POST["pubdate"].'" where patent_no='.$t.';';
              $res3=$conn->query($uq);
              if($res3)
              {
                echo "<br> Success <br>";
              }
              else
              {
                echo "Error <br>";
                //echo $uq."<br>";
              }
           }
        }
        echo "</form>";

	}
	
	
	


	else if($_POST["Type"]=="book"){
	$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" selected>Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titleb" value="'.$_POST["titleb"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        echo "</form>";

        if(isset($_POST["upd"]))
        {  

          
          

        }
	
	}
	
	
	


	
	else if($_POST["Type"]=="conference"){
	$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" selected>Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlec" value="'.$_POST["titlec"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        echo "</form>";

        if(isset($_POST["upd"]))
        {  
          
          

        }
	
	}
	
	


	
	else if($_POST["Type"]=="book_chapter"){
	$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" selected>Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option></select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlebc" value="'.$_POST["titlebc"].'" > </td> </tr>
          
          <tr> <td> chapter title </td> <td> <input type="text" name="chtitle" value="'.$_POST["chtitle"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        echo "</form>";


        if(isset($_POST["upd"]))
        {  

          
          

        }
	}




  else if($_POST["Type"]=="project"){
  $op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project" selected>Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> Title </td> <td> <input type="text" name="titlepro" value="'.$_POST["titlepro"].'" > </td> </tr>
          
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Retrieve'>";
        echo "</form>";

        if(isset($_POST["upd"]))
        {  

          
          

        }
  
  }
	
	

*/
}





if($flag==0)
{
	$op='<form action="update.php" method="post"> Type :<select name="Type"> <option value="journal">Research Paper</option>  <option value="book_chapter" >Book chapter</option> </select> <br><br> <input type="submit" name="load" value="Load"> </form> <br>';
echo $op;

}



?> 

</body>
