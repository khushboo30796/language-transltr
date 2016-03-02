<?php 
$h='localhost';
$u='root';
$p='ramesh';
$d='portal';


$conn=new mysqli($h,$u,$p,$d);

?>


<?php
 /*Add Publications:
<form action="insert.php" method="post">
Type :<select name="Type">
<option value="journal">Journal</option>
<option value="patent" >Patent</option>
<option value="book" >Book</option>
<option value="book_chapter" >Book chapter</option>
<option value="conference" >Conference</option>
</select>
<input type="submit" name="load" value="Load">
</form> 


*/ ?>
<body bgcolor="Lavender">
<p align="right"><a href="loginhome.php">Home</a>  &nbsp; &nbsp;
<center><h2>Enter new Publication/Patent Info.</h2>
<?php
$flag=0;


if(isset($_POST["load"]) || isset($_POST["ins"])){

	$flag=1;
	if($_POST["Type"]=='journal')
		{
		$op='<form action="insert.php" method="post"> 
		Type :<select name="Type"> 
		<option value="journal">Journal</option>
		<option value="patent" >Patent</option> 
		<option value="book" >Book</option>
		<option value="book_chapter" >Book chapter</option>
	  	<option value="conference" >Conference</option> 
		<option value="project">Project</option> 
		</select> <br><br> <input type="submit" name="load" value="Load"><br> ';
        echo $op;
        echo "<br>";
        $t=$_POST["title"];
        $tb='<table border=1>
          <tr> <td> jname </td> <td> <input type="text" name="jname" value="'.$_POST["jname"].'" > </td> </tr>
          <tr> <td> title </td> <td> <input type="text" name="title" value="'.$_POST["title"].'" > </td> </tr>
          <tr> <td> acad yr </td> <td> <input type="text" name="acadyear" value="'.$_POST["acadyear"].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyear" value="'.$_POST["pubyear"].'" > </td> </tr>
          <tr> <td> issue </td> <td> <input type="text" name="issue" value="'.$_POST["issue"].'" > </td> </tr>
          <tr> <td> vol </td> <td> <input type="text" name="vol" value="'.$_POST["vol"].'" > </td> </tr>
          <tr> <td> pg start </td> <td> <input type="text" name="pgstart" value="'.$_POST["pgstart"].'" > </td> </tr>
          <tr> <td> pg end </td> <td> <input type="text" name="pgend" value="'.$_POST["pgend"].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="url" value="'.$_POST["url"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
        if(isset($_POST["ins"]))
        { $q='insert into journal values("'.$_POST["jname"].'","'.$_POST["title"].'",'.$_POST["acadyear"].','.$_POST["pubyear"].','.$_POST["issue"].','.$_POST["vol"].','.$_POST["pgstart"].','.$_POST["pgend"].',"'.$_POST["url"].'");';
          $res=$conn->query($q);
          if($res==true)
          { 
            echo "Success \n";
            $fid=$_COOKIE["fid"];
            $q2='insert into author_journal value('.$fid.',"'.$_POST["title"].'");';
            $res2=$conn->query($q2);
          } 
          else
            echo 'Invalid entries <br>';

          
          

        }

        

	}
	else if($_POST["Type"]=="patent"){
		$op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" selected>Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br><br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlep" value="'.$_POST["titlep"].'" > </td> </tr>
          <tr> <td> patent no </td> <td> <input type="text" name="pno" value="'.$_POST["pno"].'" > </td> </tr>
          <tr> <td> pub date </td> <td> <input type="text" name="pubdate" value="'.$_POST["pubdate"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearp" value="'.$_POST["acadyearp"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";

        if(isset($_POST["ins"]))
        { $q='insert into patents values("'.$_POST["titlep"].'",'.$_POST["pno"].',"'.$_POST["pubdate"].'","'.$_POST["acadyearp"].'");';
          $res=$conn->query($q);
          if($res==true)
          {  
            echo "Success \n";
            $fid=$_COOKIE["fid"];
           $q2='insert into invents values('.$fid.','.$_POST["pno"].');';
           $res2=$conn->query($q2);

          }  
          else
            echo 'Invalid entries <br>';

          
          

        }

	}
	
	
	
	else if($_POST["Type"]=="book"){
	$op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" selected>Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titleb" value="'.$_POST["titleb"].'" > </td> </tr>
          <tr> <td> publisher </td> <td> <input type="text" name="publisherb" value="'.$_POST["publisherb"].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyearb" value="'.$_POST["pubyearb"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearb" value="'.$_POST["acadyearb"].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="urlb" value="'.$_POST["urlb"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";

        if(isset($_POST["ins"]))
        {  $q='insert into book values("'.$_POST["titleb"].'","'.$_POST["publisherb"].'",'.$_POST["pubyearb"].','.$_POST["acadyearb"].',"'.$_POST["urlb"].'");';
          $res=$conn->query($q);
          if($res==true){
            echo "Success \n";
            $fid=$_COOKIE["fid"];
            $q2='insert into author_book values('.$fid.',"'.$_POST["titleb"].'");';
            $res2=$conn->query($q2);
          }
          else
            echo 'Invalid entries <br>';

          
          

        }
	
	}
	
	
	
	
	else if($_POST["Type"]=="conference"){
	$op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" selected>Conference</option> <option value="project">Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlec" value="'.$_POST["titlec"].'" > </td> </tr>
          <tr> <td> conf. name </td> <td> <input type="text" name="confname" value="'.$_POST["confname"].'" > </td> </tr>
          <tr> <td> place </td> <td> <input type="text" name="place" value="'.$_POST["place"].'" > </td> </tr>
          <tr> <td> conf date </td> <td> <input type="text" name="date" value="'.$_POST["date"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearc" value="'.$_POST["acadyearc"].'" > </td> </tr>
          <tr> <td> pg no </td> <td> <input type="text" name="pgno" value="'.$_POST["pgno"].'" > </td> </tr>                    
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";

        if(isset($_POST["ins"]))
        {  $q='insert into conference values("'.$_POST["titlec"].'","'.$_POST["confname"].'","'.$_POST["place"].'","'.$_POST["date"].'",'.$_POST["acadyearc"].','.$_POST["pgno"].');';
          $res=$conn->query($q);
          if($res==true)
          {  
            echo "Success \n";
            $fid=$_COOKIE["fid"];
            $q2='insert into author_conf values('.$fid.',"'.$_POST["titlec"].'");';
            $res2=$conn->query($q2);
          }  

          else
            echo 'Invalid entries <br>';

          
          

        }
	
	}
	
	
	
	else if($_POST["Type"]=="book_chapter"){
	$op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" selected>Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option></select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlebc" value="'.$_POST["titlebc"].'" > </td> </tr>
          <tr> <td> editor </td> <td> <input type="text" name="editor" value="'.$_POST["editor"].'" > </td> </tr>
          <tr> <td> chapter title </td> <td> <input type="text" name="chtitle" value="'.$_POST["chtitle"].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyearbc" value="'.$_POST["pubyearbc"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearbc" value="'.$_POST["acadyearbc"].'" > </td> </tr>
          <tr> <td> publisher </td> <td> <input type="text" name="publisherbc" value="'.$_POST["publisherbc"].'" > </td> </tr> 
          <tr> <td> url </td> <td> <input type="text" name="urlbc" value="'.$_POST["urlbc"].'" > </td> </tr>                             
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";


        if(isset($_POST["ins"]))
        {  $q='insert into book_chapter values("'.$_POST["titlebc"].'","'.$_POST["editor"].'","'.$_POST["chtitle"].'",'.$_POST["pubyearbc"].','.$_POST["acadyearbc"].',"'.$_POST["publisherbc"].'","'.$_POST["urlbc"].'");';
          $res=$conn->query($q);
          if($res==true)
          {
            
            echo "Success \n";
            $fid=$_COOKIE["fid"];
            $q2='insert into author_book_chapter values('.$fid.',"'.$_POST["titlebc"].'","'.$_POST["chtitle"].'");';
            $res2=$conn->query($q2);
          }  
          else
            echo 'Invalid entries <br>';

          
          

        }
	}
  else if($_POST["Type"]=="project"){
  $op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project" selected>Project</option> </select> <br> <br> <input type="submit" name="load" value="Load"> <br> ';
echo $op;
echo "<br>";
$tb='<table border=1>
          
          <tr> <td> Title </td> <td> <input type="text" name="titlepro" value="'.$_POST["titlepro"].'" > </td> </tr>
          <tr> <td> Project Sponsor </td> <td> <input type="text" name="sponsor" value="'.$_POST["sponsor"].'" > </td> </tr>
          <tr> <td> Start Date </td> <td> <input type="text" name="sdate" value="'.$_POST["sdate"].'" > </td> </tr>
          <tr> <td> End Date (Blank if ongoing) </td> <td> <input type="text" name="edate" value="'.$_POST["edate"].'" > </td> </tr>
          <tr> <td> Budget</td> <td> <input type="text" name="budget" value="'.$_POST["budget"].'" > </td> </tr>
          <tr> <td> Project Type </td> <td> <input type="text" name="typepro" value="'.$_POST["typepro"].'" > </td> </tr>                    
           </table> ';
        echo $tb;
        echo "<br>";
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";

        if(isset($_POST["ins"]))
        {  $q='insert into project values("'.$_POST["titlepro"].'","'.$_POST["sponsor"].'","'.$_POST["sdate"].'","'.$_POST["edate"].'",'.$_POST["budget"].',"'.$_POST["typepro"].'");';
          $res=$conn->query($q);
          if($res==true)
          {  
            echo "Success \n";
            $fid=$_COOKIE["fid"];
            $q2='insert into investigator values('.$fid.',"'.$_POST["titlepro"].'");';
            $res2=$conn->query($q2);
          }  

          else
            echo 'Invalid entries <br>';

          
          

        }
  
  }
	
	


}

if($flag==0)
{
	$op='<form action="insert.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> <option value="project">Project</option></select> <br><br> <input type="submit" name="load" value="Load"> </form> <br>';
echo $op;

}



?> 

</body>
