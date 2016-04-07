<?php 
include "connection.php";
?>

<p align="right"><a href="loginhome1.php">Home</a></p>
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h3>Research Paper Portal</h3>
<h3>Add new publication/patent</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
</body>	

<?php
echo "<center>";
$t=$_POST['typ'];
//echo $t;
	if(isset($_POST['ins']))
			{
			if($t=="Research Paper")
				{
				$targetfolder = "/var/www/html/sepro/uploads/";
 
				 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 					
				if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
				 {
 
				 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
 
				 }
				 
				$q1="insert into journal values('".$_POST["jname"]."','".$_POST["title"]."','".$_POST["acad_year"]."',".$_POST["pub_year"].",".$_POST["issue"].",".$_POST["vol"].",".$_POST["pg_start"].",".$_POST["pg_end"].",'uploads/". basename( $_FILES['file']['name']) ."','".$_POST["auth"]."');";
				
				
				
				
				 
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					$fid=$_COOKIE["fid"];
           				$q2='insert into author_journal value('.$fid.',"'.$_POST["title"].'");';
            				$res2=$conn->query($q2);
					echo "<a href='insert4.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert4.php'>Go back</a>";
					}
				}
				
			if($t=="patent")
				{
				$q1='insert into patents values("'.$_POST["title"].'",'.$_POST["patent_no"].',"'.$_POST["pub_date"].'","'.$_POST["acad_year"].'");';
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					 $fid=$_COOKIE["fid"];
           $q2='insert into invents values('.$fid.','.$_POST["patent_no"].');';
           $res2=$conn->query($q2);
					echo "<a href='insert1.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert1.php'>Go back</a>";
					}
				}	
				
			if($t=="book")
				{
				$q1='insert into book values("'.$_POST["title"].'","'.$_POST["publisher"].'",'.$_POST["pub_date"].',"'.$_POST["acad_year"].'","'.$_POST["url"].'");';
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					$fid=$_COOKIE["fid"];
            $q2='insert into author_book values('.$fid.',"'.$_POST["title"].'");';
            $res2=$conn->query($q2);
					echo "<a href='insert1.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert1.php'>Go back</a>";
					}
				}	
				
			if($t=="Book chapter")
				{
				$q1='insert into book_chapter values("'.$_POST["book_title"].'","'.$_POST["editor"].'","'.$_POST["ch_title"].'",'.$_POST["pub_year"].','.$_POST["acad_year"].',"'.$_POST["publisher"].'","'.$_POST["url"].'");';
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					$fid=$_COOKIE["fid"];
            $q2='insert into author_book_chapter values('.$fid.',"'.$_POST["book_title"].'","'.$_POST["ch_title"].'");';
            $res2=$conn->query($q2);
					echo "<a href='insert1.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert1.php'>Go back</a>";
					}
				}	
			if($t=="Conference")
				{
				$q1='insert into conference values("'.$_POST["title"].'","'.$_POST["conf_name"].'","'.$_POST["place"].'","'.$_POST["conf_date"].'",'.$_POST["acad_year"].','.$_POST["pg_no"].');';
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					$fid=$_COOKIE["fid"];
            $q2='insert into author_conf values('.$fid.',"'.$_POST["title"].'");';
            $res2=$conn->query($q2);
					echo "<a href='insert1.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert1.php'>Go back</a>";
					}
				}	
			if($t=="Project")
				{
				$q1='insert into project values("'.$_POST["title"].'","'.$_POST["sponsor"].'","'.$_POST["start_date"].'","'.$_POST["end_date"].'",'.$_POST["budget"].',"'.$_POST["ty"].'");';
				$r1=$conn->query($q1);
				if($r1)
					{
					echo "Success<br>";
					$fid=$_COOKIE["fid"];
            $q2='insert into investigator values('.$fid.',"'.$_POST["title"].'");';
            $res2=$conn->query($q2);
					echo "<a href='insert1.php'>Go back</a>";
					}
				else
					{echo "Invalid Entries<br>";
					echo "<a href='insert1.php'>Go back</a>";
					}
				}	
			}

?>
