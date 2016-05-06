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
		background-position: 50% 50%;
		background-size: 500px 800px;
		">
</body>		

<?php
      session_start();
      //echo $_SESSION;
    ?>

<?php
$flag=0;

$uploader = $_SESSION['login'];



if(isset($_POST["load"]) || isset($_POST["upd"]) || isset($_POST["up"])){

	$flag=1;
	if($_POST["Type"]=='journal'){
		$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option>  </select> <br><br> <input type="submit" name="load" value="Update new"><br> ';
        echo $op;
        echo "<br>";
        $t=$_POST["title"];
        $tb='<table >  <tr> <td> title </td> <td> <input type="text" name="title" value="'.$_POST["title"].'" > </td> </tr>
          
           </table> ';
        
        echo '<td>
	Pick Title: <select name="title">';
	 
	$sql="select title from journal where uploader = '".$uploader."';";
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
            
            $tb2='<table > <tr> <td> Journal name </td> <td> <input type="text" name="jname" value="'.$row[0].'" > </td> </tr> 
            <tr> <td> title </td> <td> <input type="text" name="title" value="'.$row[1].'" readonly> </td> </tr>
          <tr> <td> Academic year </td> <td> <input type="text" name="acadyear" value="'.$row[2].'" > </td> </tr>
          <tr> <td> Year Published </td> <td> <input type="text" name="pubyear" value="'.$row[3].'" > </td> </tr>
          <tr> <td> Issue </td> <td> <input type="text" name="issue" value="'.$row[4].'" > </td> </tr>
          <tr> <td> Volume </td> <td> <input type="text" name="vol" value="'.$row[5].'" > </td> </tr>
          <tr> <td> Page Start </td> <td> <input type="text" name="pgstart" value="'.$row[6].'" > </td> </tr>
          <tr> <td> Page end </td> <td> <input type="text" name="pgend" value="'.$row[7].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="url" value="'.$row[8].'" readonly > </td> </tr>
          <tr> <td> Author </td> <td> <input type="text" name="auth" value="'.$row[9].'" > </td> </tr>
           </table> ';

           if(isset($_POST["upd"]))
           {
           	echo "<br>".$tb2."<br>";
           	echo "<input type='submit' name='up' value='Update'>";
           }	

           if(isset($_POST["up"]))
           {
              if($_POST['jname']==NULL || $_POST["acadyear"]==NULL || $_POST["pubyear"]==NULL || $_POST["issue"]==NULL || $_POST["vol"]==NULL || $_POST["pgstart"]==NULL || $_POST["pgend"]==NULL || $_POST["auth"]==NULL){
                echo "Please enter all the details.<br>";
                echo "<a href='update2.php'> Go Back </a>";
              }else{
             		$uq='update journal set jname="'.$_POST["jname"].'",title="'.$_POST["title"].'",acad_year="'.$_POST["acadyear"].'",pub_year='.$_POST["pubyear"].',issue='.$_POST["issue"].',vol='.$_POST["vol"].',pg_start='.$_POST["pgstart"].',pg_end='.$_POST["pgend"].',url="'.$_POST["url"].'",author_name="'.$_POST["auth"].'" where title="'.$t.'";';
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
        }
        echo "</form>";

        

	}


/*

	
	else if($_POST["Type"]=="book_chapter"){
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
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
*/

	


}





if($flag==0)
{
	$op='<form action="update2.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option>  </select> <br><br> <input type="submit" name="load" value="Update new"> </form> <br>';
echo $op;

}



?> 


