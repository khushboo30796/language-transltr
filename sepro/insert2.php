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
		background-position: 50% 35%;
		background-size: 500px 800px
		">
</body>	

<?php
echo "<center>";
$t=$_POST["type"];
if(isset($_POST['subm']))
	{
		if($t=="journal")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="Research Paper" readonly></td>
		</tr>
		
		<tr>
			<td>Journal Name:</td><td> <input type= "text" name="jname"></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Academic Year: </td><td><input type= "text" name="acad_year"></td>
		</tr>
		<tr>
			<td>Year of publication:</td><td> <input type= "text" name="pub_year"></td>
		</tr>
		<tr>
			<td>Issue no.:</td><td> <input type= "text" name="issue"></td>
		</tr>
		<tr>
			<td>Volume:</td><td> <input type= "text" name="vol"></td>
		</tr>
		<tr>
			<td>Starting Page:</td><td> <input type= "text" name="pg_start"></td>
		</tr>
		<tr>
			<td>Ending page:</td><td> <input type= "text" name="pg_end"></td>
		</tr>
		<tr>
			<td>Url:</td><td> <input type= "text" name="url"></td>
		</tr>
		
		
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
	
		}



		if($t=="patent")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="patent" readonly></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Patent no.: </td><td><input type= "text" name="patent_no"></td>
		</tr>
		<tr>
			<td>Date of Publication:</td><td> <input type= "text" name="pub_date"> (yyyy-mm-dd)</td>
		</tr>
		<tr>
			<td>Academic year:</td><td> <input type= "text" name="acad_year"> (yyyy-yy)</td>
		</tr>
		
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
		}
		
		if($t=="book")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="book" readonly></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Publisher: </td><td><input type= "text" name="publisher"></td>
		</tr>
		<tr>
			<td>Year of Publication:</td><td> <input type= "text" name="pub_date"> (yyyy)</td>
		</tr>
		<tr>
			<td>Academic year:</td><td> <input type= "text" name="acad_year"> (yyyy-yy)</td>
		</tr>
		<tr>
			<td>Url:</td><td> <input type= "text" name="url"></td>
		</tr>
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
		}
		
		if($t=="book_chapter")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="Book chapter" readonly></td>
		</tr>
		<tr>
			<td>Book title: </td><td><input type= "text" name="book_title"></td>
		</tr>
		<tr>
			<td>Editor: </td><td><input type= "text" name="editor"></td>
		</tr>
		
		<tr>
			<td>Chapter name: </td><td><input type= "text" name="ch_title"></td>
		</tr>
		<tr>
			<td>Year of Publication:</td><td> <input type= "text" name="pub_year"> (yyyy)</td>
		</tr>
		<tr>
			<td>Academic year:</td><td> <input type= "text" name="acad_year"> (yyyy-yy)</td>
		</tr>
		<tr>
			<td>Publisher: </td><td><input type= "text" name="publisher"></td>
		</tr>
		<tr>
			<td>Url:</td><td> <input type= "text" name="url"></td>
		</tr>
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
		}
		
	if($t=="conference")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="Conference" readonly></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Conference Name: </td><td><input type= "text" name="conf_name"></td>
		</tr>
		
		<tr>
			<td>Place: </td><td><input type= "text" name="place"></td>
		</tr>
		<tr>
			<td>Date of conference:</td><td> <input type= "text" name="conf_date"> (yyyy-mm-dd)</td>
		</tr>
		<tr>
			<td>Academic year:</td><td> <input type= "text" name="acad_year"> (yyyy-yy)</td>
		</tr>
		<tr>
			<td>Page no: </td><td><input type= "text" name="pg_no"></td>
		</tr>
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
		}
		
	if($t=="project")
		{
		$str='
	
		<form action ="insert3.php" method="POST">
		<table>
		<tr>
			<td>Type:</td><td> <input type= "text" name="typ" value="Project" readonly></td>
		</tr>
		<tr>
			<td>Title: </td><td><input type= "text" name="title"></td>
		</tr>
		<tr>
			<td>Sponsor: </td><td><input type= "text" name="sponsor"></td>
		</tr>
		
		<tr>
			<td>Start Date:</td><td> <input type= "text" name="start_date"> (yyyy-mm-dd)</td>
		</tr>
		<tr>
			<td>End Date:</td><td> <input type= "text" name="end_date"> (yyyy-mm-dd)/Blank if ongoing</td>
		</tr>
		<tr>
			<td>Budget: </td><td><input type= "text" name="budget"></td>
		</tr>
		
		<tr>
			<td>type: </td><td><input type= "text" name="ty"></td>
		</tr>
		</table>
		<input type="submit" value="insert" name="ins">
		</form>';
		echo $str;
		}	
	}

?>
