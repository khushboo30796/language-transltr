<?php 
$h='localhost';
$u='root';
$p='tiger';
$d='portal';


$conn=new mysqli($h,$u,$p,$d);

?>
<?php
 /*Add Publications:
<form action="modify.php" method="post">
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

<center><h2>Enter new publication/patent Info.</h2>
<?php
$flag=0;


if(isset($_POST["load"]) || isset($_POST["ins"])){

	$flag=1;
	if($_POST["Type"]=='journal'){
		$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> </select> <br><input type="submit" name="load" value="Load"> ';
        echo $op;
        $t=$_POST["title"];
        $tb='<table border=1> <tr> <td> jname </td> <td> <input type="text" name="jname" value="'.$_POST["jname"].'" > </td> </tr> <tr> <td> title </td> <td> <input type="text" name="title" value="'.$_POST["title"].'" > </td> </tr>
          <tr> <td> acad yr </td> <td> <input type="text" name="acadyear" value="'.$_POST["acadyear"].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyear" value="'.$_POST["pubyear"].'" > </td> </tr>
          <tr> <td> issue </td> <td> <input type="text" name="issue" value="'.$_POST["issue"].'" > </td> </tr>
          <tr> <td> vol </td> <td> <input type="text" name="vol" value="'.$_POST["vol"].'" > </td> </tr>
          <tr> <td> pg start </td> <td> <input type="text" name="pgstart" value="'.$_POST["pgstart"].'" > </td> </tr>
          <tr> <td> pg end </td> <td> <input type="text" name="pgend" value="'.$_POST["pgend"].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="url" value="'.$_POST["url"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
        
        
        

	}
	else if($_POST["Type"]=="patent"){
		$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" selected>Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> </select> <br> <input type="submit" name="load" value="Load">  ';
echo $op;
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlep" value="'.$_POST["titlep"].'" > </td> </tr>
          <tr> <td> patent no </td> <td> <input type="text" name="pno" value="'.$_POST["pno"].'" > </td> </tr>
          <tr> <td> pub date </td> <td> <input type="text" name="pubdate" value="'.$_POST["pubdate"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearp" value="'.$_POST["acadyearp"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
	}
	
	
	
	else if($_POST["Type"]=="book"){
	$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" selected>Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> </select> <br> <input type="submit" name="load" value="Load">  ';
echo $op;
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlep" value="'.$_POST["titleb"].'" > </td> </tr>
          <tr> <td> publisher </td> <td> <input type="text" name="publisherb" value="'.$_POST["publisherb"].'" > </td> </tr>
          <tr> <td> pub year </td> <td> <input type="text" name="pubyearb" value="'.$_POST["pubyearb"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearp" value="'.$_POST["acadyearp"].'" > </td> </tr>
          <tr> <td> url </td> <td> <input type="text" name="urlb" value="'.$_POST["urlb"].'" > </td> </tr>
           </table> ';
        echo $tb;
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
	
	}
	
	
	
	
	else if($_POST["Type"]=="conference"){
	$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" selected>Conference</option> </select> <br> <input type="submit" name="load" value="Load">  ';
echo $op;
$tb='<table border=1>
          
          <tr> <td> title </td> <td> <input type="text" name="titlec" value="'.$_POST["titlec"].'" > </td> </tr>
          <tr> <td> conf. name </td> <td> <input type="text" name="confname" value="'.$_POST["confname"].'" > </td> </tr>
          <tr> <td> place </td> <td> <input type="text" name="place" value="'.$_POST["place"].'" > </td> </tr>
          <tr> <td> conf date </td> <td> <input type="text" name="date" value="'.$_POST["date"].'" > </td> </tr>
          <tr> <td> acad year </td> <td> <input type="text" name="acadyearbc" value="'.$_POST["acadyearbc"].'" > </td> </tr>
          <tr> <td> pg no </td> <td> <input type="text" name="pgno" value="'.$_POST["pgno"].'" > </td> </tr>                    
           </table> ';
        echo $tb;
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
	
	}
	
	
	
	else if($_POST["Type"]=="book_chapter"){
	$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" selected>Book chapter</option> <option value="conference" >Conference</option> </select> <br> <input type="submit" name="load" value="Load">  ';
echo $op;
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
        echo "<input type='submit' name='ins' value='Insert'>";
        echo "</form>";
	}
	
	


}

if($flag==0)
{
	$op='<form action="modify.php" method="post"> Type :<select name="Type"> <option value="journal">Journal</option> <option value="patent" >Patent</option> <option value="book" >Book</option> <option value="book_chapter" >Book chapter</option> <option value="conference" >Conference</option> </select> <br> <input type="submit" name="load" value="Load"> </form> ';
echo $op;

}



?> 
