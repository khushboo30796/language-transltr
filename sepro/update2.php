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
$flag=0;





if(isset($_POST["load"]) || isset($_POST["upd"]) || isset($_POST["up"])){

	$flag=1;
	if($_POST["Type"]=='journal'){
		$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br><br> <input type="submit" name="load" value="Load"><br> ';
        echo $op;
        echo "<br>";
        $t=$_POST["title"];
        $tb='<table >  <tr> <td> title </td> <td> <input type="text" name="title" value="'.$_POST["title"].'" > </td> </tr>
          
           </table> ';
        
        echo '<td>
	Pick Title: <select name="title">';
	 
	$sql="select title from journal ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['title']."'>".$row['title']."</option>";
	}
	echo '</select>
	</td> '; 
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
        
        if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
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
           </table> ';

           if(isset($_POST["upd"]))
           {
           	echo "<br>".$tb2."<br>";
           	echo "<input type='submit' name='up' value='Update'>";
           }	

           if(isset($_POST["up"]))
           {
           		$uq='update journal set jname="'.$_POST["jname"].'",title="'.$_POST["title"].'",acad_year="'.$_POST["acadyear"].'",pub_year='.$_POST["pubyear"].',issue='.$_POST["issue"].',vol='.$_POST["vol"].',pg_start='.$_POST["pgstart"].',pg_end='.$_POST["pgend"].',url="'.$_POST["url"].'" where title="'.$t.'";';
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
		$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" selected>Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br><br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table >
          
          
          <tr> <td> patent no </td> <td> <input type="text" name="pno" value="'.$_POST["pno"].'" > </td> </tr>
          
           </table> ';
        echo '<td>
	Pick patent title: <select name="pno">';
	 
	$sql="select title,patent_no from patents ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['patent_no']."'>".$row['title']."</option>";
	}
	echo '</select>
	</td> ';
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
        //echo "</form>";

        if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from patents where patent_no='.$_POST["pno"].';';
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            $t=$_POST["pno"];
            
            $tb2='<table > <tr> <td> title </td> <td> <input type="text" name="titlep" value="'.$row[0].'" > </td> </tr>
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
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" selected>Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table >
          
          <tr> <td> title </td> <td> <input type="text" name="titleb" value="'.$_POST["titleb"].'" > </td> </tr>
          
           </table> ';
        echo '<td>
	Pick Book: <select name="titleb">';
	 
	$sql="select title from book ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['title']."'>".$row['title']."</option>";
	}
	echo '</select>
	</td> '; 
        
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
       // echo "</form>";

       if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from book where title="'.$_POST["titleb"].'";';
            //echo $q;
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            $t=$_POST["titleb"];
            
            $tb2='<table>
          
          <tr> <td> title </td> <td> <input type="text" name="titleb" value="'.$row[0].'" > </td> </tr>
          <tr> <td> publisher </td> <td> <input type="text" name="publisherb" value="'.$row[1].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyearb" value="'.$row[2].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearb" value="'.$row[3].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="urlb" value="'.$row[4].'" > </td> </tr>
           </table> ';
            

           if(isset($_POST["upd"]))
           {
            echo "<br>".$tb2."<br>";
            echo "<input type='submit' name='up' value='Update'>";
           }  

           if(isset($_POST["up"]))
           {
              $uq='update book set title="'.$_POST["titleb"].'",publisher="'.$_POST["publisherb"].'",pub_year='.$_POST["pubyearb"].',acad_year='.$_POST["acadyearb"].',url="'.$_POST["urlb"].'" where title="'.$t.'";';
              //echo $uq;
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
	
	
	
	


	
	else if($_POST["Type"]=="conference"){
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" selected>Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table >
          
          <tr> <td> title </td> <td> <input type="text" name="titlec" value="'.$_POST["titlec"].'" > </td> </tr>
          
           </table> ';
        echo '<td>
	Pick conference Title: <select name="titlec">';
	 
	$sql="select title from conference ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['title']."'>".$row['title']."</option>";
	}
	echo '</select>
	</td> '; 
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
       // echo "</form>";

       if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from conference where title="'.$_POST["titlec"].'";';
            //echo $q;
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            $t=$_POST["titlec"];
            
            $tb2='<table >
          
          <tr> <td> title </td> <td> <input type="text" name="titlec" value="'.$row[0].'" > </td> </tr>
          <tr> <td> conf. name </td> <td> <input type="text" name="confname" value="'.$row[1].'" > </td> </tr>
          <tr> <td> place </td> <td> <input type="text" name="place" value="'.$row[2].'" > </td> </tr>
          <tr> <td> conf date </td> <td> <input type="text" name="date" value="'.$row[3].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearc" value="'.$row[4].'" > </td> </tr>
          <tr> <td> pg no </td> <td> <input type="text" name="pgno" value="'.$row[5].'" > </td> </tr>                    
           </table> ';
            

           if(isset($_POST["upd"]))
           {
            echo "<br>".$tb2."<br>";
            echo "<input type='submit' name='up' value='Update'>";
            //echo "upd";
           }  

           if(isset($_POST["up"]))
           {	//echo "up";
              $uq='update conference set title="'.$_POST["titlec"].'",conf_name="'.$_POST["confname"].'",place="'.$_POST["place"].'",conf_date="'.$_POST["date"].'",acad_year='.$_POST["acadyearc"].',pg_no='.$_POST["pgno"].' where title="'.$t.'";';
              //echo $uq;
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
	
	*/


	
	else if($_POST["Type"]=="book_chapter"){
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" selected>Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option></select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table >
          
          <tr> <td> title </td> <td> <input type="text" name="titlebc" value="'.$_POST["titlebc"].'" > </td> </tr>
          
          <tr> <td> chapter title </td> <td> <input type="text" name="chtitle" value="'.$_POST["chtitle"].'" > </td> </tr>
          
           </table> ';
        echo '<td>
	Pick Book: <select name="titlebc">';
	 
	$sql="select book_title from book_chapter ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['book_title']."'>".$row['book_title']."</option>";
	}
	echo '</select>
	</td> &nbsp &nbsp';
	echo '<td>
	Pick Chapter: <select name="chtitle">';
	 
	$sql="select ch_title from book_chapter ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['ch_title']."'>".$row['ch_title']."</option>";
	}
	echo '</select>
	</td> ';
	
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
        //echo "</form>";


        if(isset($_POST["upd"]) || isset($_POST["up"]))
        {  

          
            $q='select * from book_chapter where book_title="'.$_POST["titlebc"].'" and ch_title="'.$_POST["chtitle"].'" ;';
            //echo $q;
            $res2=$conn->query($q);
            if($res2){}
            else
            	echo "Book ".$_POST["titlebc"]."doesn't contain chapter ".$_POST["chtitle"];
            $row=$res2->fetch_row();
            $t=$_POST["titlebc"];
            $tc=$_POST["chtitle"];
            
            $tb2='<table>
          
          <tr> <td> title </td> <td> <input type="text" name="titlebc" value="'.$row[0].'" readonly > </td> </tr>
          <tr> <td> editor </td> <td> <input type="text" name="editor" value="'.$row[1].'" > </td> </tr>
          <tr> <td> chapter title </td> <td> <input type="text" name="chtitle" value="'.$row[2].'" readonly > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyearbc" value="'.$row[3].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearbc" value="'.$row[4].'" > </td> </tr>
          <tr> <td> publisher </td> <td> <input type="text" name="publisherbc" value="'.$row[5].'" > </td> </tr> 
          <tr> <td> url </td> <td> <input type="text" name="urlbc" value="'.$row[6].'" > </td> </tr>                             
           </table> ';
            
            

           if(isset($_POST["upd"]))
           {
            echo "<br>".$tb2."<br>";
            echo "<input type='submit' name='up' value='Update'>";
            //echo "upd";
           }  

           if(isset($_POST["up"]))
           {	//echo "up";
              $uq='update book_chapter set book_title="'.$_POST["titlebc"].'",editor="'.$_POST["editor"].'",ch_title="'.$_POST["chtitle"].'",pub_year='.$_POST["pubyearbc"].',acad_year="'.$_POST["acadyearbc"].'",publisher="'.$_POST["publisherbc"].'",url="'.$_POST["urlbc"].'" where book_title="'.$t.'" and ch_title="'.$tc.'";';
              //echo $uq;
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
  else if($_POST["Type"]=="project"){
  $op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project" selected>Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table >
          
          <tr> <td> Title </td> <td> <input type="text" name="titlepro" value="'.$_POST["titlepro"].'" > </td> </tr>
          
           </table> ';
        echo '<td>
	Pick Project: <select name="titlepro">';
	 
	$sql="select title from project ;";
	$res=$conn->query($sql);
	//echo "<option value='all' selected>All</option>";
	while($row=$res->fetch_assoc()){
	echo "<option value='".$row['title']."'>".$row['title']."</option>";
	}
	echo '</select>
	</td> '; 
        //echo $tb;
        echo "<br>";
        echo "<input type='submit' name='upd' value='Find'>";
        //echo "</form>";

        if(isset($_POST["upd"]) || isset($_POST["up"]))
        { 
          
            $q='select * from project where title="'.$_POST["titlepro"].'";';
            //echo $q;
            $res2=$conn->query($q);
            $row=$res2->fetch_row();
            $t=$_POST["titlepro"];
            
            $tb2='<table>
          
          <tr> <td> Title </td> <td> <input type="text" name="titlepro" value="'.$row[0].'" readonly> </td> </tr>
          <tr> <td> Project Sponsor </td> <td> <input type="text" name="sponsor" value="'.$row[1].'" > </td> </tr>
          <tr> <td> Start Date </td> <td> <input type="text" name="sdate" value="'.$row[2].'" > </td> </tr>
          <tr> <td> End Date (Blank if ongoing) </td> <td> <input type="text" name="edate" value="'.$row[3].'" > </td> </tr>
          <tr> <td> Budget</td> <td> <input type="text" name="budget" value="'.$row[4].'" > </td> </tr>
          <tr> <td> Project Type </td> <td> <input type="text" name="typepro" value="'.$row[5].'" > </td> </tr>                    
           </table> ';
       
            
            

           if(isset($_POST["upd"]))
           {
            echo "<br>".$tb2."<br>";
            echo "<input type='submit' name='up' value='Update'>";
            //echo "upd";
           }  

           if(isset($_POST["up"]))
           {	//echo "up";
              $uq='update project set title="'.$_POST["titlepro"].'",sponsor="'.$_POST["sponsor"].'",start_date="'.$_POST["sdate"].'",end_date="'.$_POST["edate"].'",budget='.$_POST["budget"].',type="'.$_POST["typepro"].'" where title="'.$t.'";';
              //echo $uq;
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
	
*/	


}





if($flag==0)
{
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option>  <option value="book_chapter" >Book chapter</option></select> <br><br> <input type="submit" name="load" value="Load"> </form> <br>';
echo $op;

}



?> 


