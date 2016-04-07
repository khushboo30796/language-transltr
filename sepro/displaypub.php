<?php
include "connection.php";
?>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">	
</head>	


<body>


<h1 class="description"> Indian Institute of Technology Indore </h1>
<div id='cssmenu'>
<ul>
   <li><a href='welcome.php'><span>Home</span></a></li>
   <li ><a href='display.php'><span>Project Portal</span></a></li>
   <li class='active'><a href='displaypub.php'><span>Publication Portal</span></a></li>
   <li class='last'><a href='contact.php'><span>Contact</span></a></li>
   <?php 
   if(!isset($_COOKIE['fid']))
   	echo "<li class='login'><a href='login.php'><span>Log In</span></a></li>";
   else{
    echo	"<li><a href='loginhome.php'><span>Dashboard</span></a></li>";
    echo "<li class='login'><a href='displaypub.php' onclick=deleteCookie()><span>Log Out</span></a></li>";
}
   ?>
   
</ul>

</div>
<center>
<h2 class="description"> Publication Portal </h2>
<form action="displaypub.php" method="POST">
<div class="box-table">	
<table>
<tr>
<th>Type of Publication</th>
<th>Faculty Member</th>
<th>Department</th>
<th>Academic Year</th>
</tr>

<tr>
<td>
<select name="type" >

<?php 
echo "<option value='all' selected>All</option>";
echo "<option value='journal'>Journal</option>";
echo "<option value='book'>Book</option>";
echo "<option value='book_chapter'>Book Chapter</option>";
echo "<option value='conf'>Conference</option>";
echo "<option value='patent'>Patents</option>";
//echo "<option value='other'>Others</option>";
?>
</select>
</td>

<td>
<select name="fname" >

<?php 
$sql="select distinct fname from faculty;";
$res=$conn->query($sql);
echo "<option value='all' selected>All</option>";
while($row=$res->fetch_assoc()){
	echo "<option value='".$row['fname']."'>".$row['fname']."</option>";
}

?>
</select>
</td>


<td>
<select name="Department">
<?php 
$sql="select distinct dept_name from department;";
$res=$conn->query($sql);
echo "<option value='all' selected>All</option>";
while($row=$res->fetch_assoc()){
	echo "<option value='".$row['dept_name']."'>".$row['dept_name']."</option>";
}

?>
</select>
</td>

<td>
<select name="acad_year">

<?php 
$cur=date("Y");

echo "<option value='all' selected>All</option>";
for($i=$cur;$i>2008;$i=$i-1){
	$next=$i+1;
	$str=$i."-".$next;
	echo "<option value='".$str."'>".$i."-".$next."</option>";
}
?>

</select>
</td>

</tr>
</table>
<br>
<button type='submit' name='displayproject'>Load</button>
</form>
<center>











<br><br>












<?php

if(isset($_POST['displayproject'])){

$flag=1;

if($_POST['type']=='all'){
	$flag=0;
	$sql_journal="select distinct journal.title,author,other_author,acad_year from journal,author_journal,faculty where journal.title=author_journal.title and faculty.fid=author_journal.fid";

	$sql_book="select distinct book.title,author,other_author,acad_year from book,author_book,faculty where book.title=author_book.title and faculty.fid=author_book.fid";

	$sql_conf="select distinct conf.title,author,other_author,acad_year from conf,author_conf,faculty where conf.title=author_conf.title and faculty.fid=author_conf.fid";

	$sql_other="select distinct other.title,author,other_author,acad_year from other,author_other,faculty where other.title=author_other.title and faculty.fid=author_other.fid";

	$sql_patent="select distinct patent.patent_no,patent.title,author,other_author,acad_year from patent,author_patent,faculty where patent.patent_no=author_patent.patent_no and faculty.fid=author_patent.fid";

	$sql_book_chapter="select distinct book_chapter.book_title,book_chapter.ch_title,author,other_author,acad_year from book_chapter,author_book_chapter,faculty where book_chapter.book_title=author_book_chapter.book_title and book_chapter.ch_title=author_book_chapter.ch_title and faculty.fid=author_book_chapter.fid";
}

else {

	$t=$_POST['type'];
	if($t!='patent'&&$t!='book_chapter')
	$sql_refined='select distinct '.$_POST['type'].'.title,author,other_author,acad_year from '.$t.',faculty,author_'.$t.' where faculty.fid=author_'.$t.'.fid and '.$t.'.title=author_'.$t.'.title';
	else if($t=='patent')
	$sql_refined='select distinct '.$_POST['type'].'.patent_no,patent.title,author,other_author,acad_year from '.$t.',faculty,author_'.$t.' where faculty.fid=author_'.$t.'.fid and '.$t.'.patent_no=author_'.$t.'.patent_no';
	else 
	$sql_refined='select distinct '.$_POST['type'].'.book_title,book_chapter.ch_title,author,other_author,acad_year from '.$t.',faculty,author_'.$t.' where faculty.fid=author_'.$t.'.fid and '.$t.'.book_title=author_'.$t.'.book_title and '.$t.'.ch_title=author_'.$t.'.ch_title';
}

if($_POST['Department']!='all'){
	if($flag==0){
		$sql_journal.=" and faculty.dname='".$_POST['Department']."'";
		$sql_book.=" and faculty.dname='".$_POST['Department']."'";
		$sql_book_chapter.=" and faculty.dname='".$_POST['Department']."'";
		$sql_conf.=" and faculty.dname='".$_POST['Department']."'";
		$sql_other.=" and faculty.dname='".$_POST['Department']."'";
		$sql_patent.=" and faculty.dname='".$_POST['Department']."'";
	}
	else {
		$sql_refined.=" and faculty.dname='".$_POST['Department']."'";
	}
}

if($_POST['fname']!='all'){
	if($flag==0){
		$sql_journal.=" and faculty.fname='".$_POST['fname']."'";
		$sql_book.=" and faculty.fname='".$_POST['fname']."'";
		$sql_book_chapter.=" and faculty.fname='".$_POST['fname']."'";
		$sql_conf.=" and faculty.fname='".$_POST['fname']."'";
		$sql_other.=" and faculty.fname='".$_POST['fname']."'";
		$sql_patent.=" and faculty.fname='".$_POST['fname']."'";
	}
	else {
		$sql_refined.=" and faculty.fname='".$_POST['fname']."'";
	}
}

if($_POST['acad_year']!='all'){
	
	if($flag==0){
		$sql_journal.=" and journal.acad_year='".$_POST['acad_year']."'";
		$sql_book.=" and book.acad_year='".$_POST['acad_year']."'";
		$sql_book_chapter.=" and book_chapter.acad_year='".$_POST['acad_year']."'";
		$sql_conf.=" and conf.acad_year='".$_POST['acad_year']."'";
		$sql_other.=" and other.acad_year='".$_POST['acad_year']."'";
		$sql_patent.=" and patent.acad_year='".$_POST['acad_year']."'";
	}
	else {
		$sql_refined.=" and ".$_POST['type'].".acad_year='".$_POST['acad_year']."'";
	}
}

$sql_journal.=";";
$sql_other.=";";
$sql_conf.=";";
$sql_patent.=";";
$sql_book_chapter.=";";
$sql_book.=";";
$sql_refined.=";";

/*
echo $sql_journal."<br>";
echo $sql_other."<br>";
echo $sql_conf."<br>";
echo $sql_patent."<br>";
echo $sql_book_chapter."<br>";
echo $sql_book."<br>";
echo $sql_refined."<br>";
*/

if($_POST['type']=='all')
{
	$res_journal=$conn->query($sql_journal);
	$res_book=$conn->query($sql_book);
	$res_patent=$conn->query($sql_patent);
	$res_conf=$conn->query($sql_conf);
	$res_other=$conn->query($sql_other);
	$res_book_chapter=$conn->query($sql_book_chapter);
//	if($res_book_chapter)
//		echo "HELLO again";
	echo '<table>';
	echo '<tr><th>S No.</th><th>Authors</th><th>Title</th><th>Academic Year</th></tr>';
	$i=1;

	$flag=0;
	

	while($row=$res_journal->fetch_assoc())
	{
		$flag=1;
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}

	//$i=1;
	while($row=$res_patent->fetch_assoc())
	{
		$flag=1;
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}
	//$i=1;
	
	while($row=$res_conf->fetch_assoc())
	{
		$flag=1;
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}
	//$i=1;
	
	while($row=$res_other->fetch_assoc())
	{
		$flag=1;
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}
	

	while($row=$res_book->fetch_assoc())
	{
		$flag=1;
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}

	while($row=$res_book_chapter->fetch_assoc())
	{
		$flag=1;
		//echo "HELLO";
		echo '<tr>';
		echo '<td>'.$i.'</td><td>'.$row['author'].";".$row['other_author'].'</td><td>'.$row['book_title'].", ".$row['ch_title'].'</td><td>'.$row['acad_year'].'</td>';
		echo '</tr>';
		$i=$i+1;
	}
 	
 	if($flag==0)
 	{
 		echo '<tr><td colspan=4>NO RECORDS FOUND</td></tr>';
 	}
	echo '</table>';
}
else{
	$flag=0;
	$res_refined=$conn->query($sql_refined);

	echo '<table>';
	echo '<tr><th>S No.</th><th>Authors</th><th>Title</th><th>Academic Year</th></tr>';
	$i=1;


	
	if($_POST['type']=='journal'){

		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}	
	}

	if($_POST['type']=='patent'){
		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}	
	}

	if($_POST['type']=='conf'){
		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}
	}
	if($_POST['type']=='other'){
		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}	
	}
	if($_POST['type']=='book'){
		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}
	}

	if($_POST['type']=='book_chapter'){
		while($row=$res_refined->fetch_assoc())
		{
			$flag=1;
			//echo "HELLO";
			echo '<tr>';
			echo '<td>'.$i.'</td><td>'.$row['author'].",".$row['other_author'].'</td><td>'.$row['book_title'].", ".$row['ch_title'].'</td><td>'.$row['acad_year'].'</td>';
			echo '</tr>';
			$i=$i+1;
		}
	}
	if($flag==0)
	{
		echo '<tr><td colspan=4>NO RECORDS FOUND</td></tr>';
	}


	echo '</table></div>';

}
/*
$res=$conn->query($sql);
//echo $sql;
$i=1;
while($row=$res->fetch_assoc()){
	echo $i." ".$row['title']." ".$row['dname'];
	if($_POST["Status"]=="all")
	{
		if($row["end_date"]=='0000-00-00')
			echo " Ongoing <br>";
		else
			echo " Completed <br>";

	}	
	else if($_POST["Status"]=="Ongoing")
	{
		echo " Ongoing <br>";
				
	}
	else if($_POST["Status"]=="Completed")
	{
		echo " Completed <br>";
				
	}
	$i=$i+1;
}
*/
}
?>
<script>
	function deleteCookie(){
		 document.cookie = "fid=; expires=Thu, 01 Jan 1970 00:00:00 UTC"; 
	}
</script>