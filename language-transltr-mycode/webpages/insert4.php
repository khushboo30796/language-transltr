<?php 
require_once('dataObject.php');
error_reporting(error_reporting()&~E_NOTICE);
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
      session_start();
      //echo $_SESSION;
    ?>

<?php
echo "<center>";
$conn=dataObject::connect();
		    if(isset($_POST['ins']))
            {
			 /*if($_POST["jname"]==NULL || $_POST["title"]==NULL || $_POST["acad_year"]==NULL || $_POST["pub_year"]==NULL || $_POST["issue"]==NULL || $_POST["vol"]==NULL || $_POST["pg_start"]==NULL || $_POST["pg_end"]==NULL || $_POST["auth"]==NULL){
                    echo "<b>Pleease fill all the values.</b><br>";
                    echo "<a href='insert4.php'>Go back</a>";
                }else if(!(is_numeric($_POST["acad_year"])) || !(is_numeric($_POST["pub_year"])) || !(is_numeric($_POST["issue"])) || !(is_numeric($_POST["vol"])) || !(is_numeric($_POST["pg_start"])) || !(is_numeric($_POST["pg_end"]))){
                    echo "Please enter valid details.<br>";
					*/
           $st=$conn->prepare("select max(articleID) as curr from articles");
				$st->execute();
				$id=$st->fetch();
                $targetfolder = "../articles/";
				$id['curr']+=1;
                 $targetfolder .= "{$id['curr']}.pdf" ;
                 if($_FILES['file']['type']=='application/pdf')    {
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
                 {
 
                 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

                    $uploader=$_SESSION['login'];
				$sql="insert into journal values(:jname, :title, :acadyear, :pubyear, :issue, :vol, :pgstart, :pgend, :url, :author, :uploader)";
				try
			{
			$st=$conn->prepare($sql);
			$st->bindValue(":jname",$_POST["jname"],PDO::PARAM_STR);
			$st->bindValue(":title",$_POST["title"],PDO::PARAM_STR);
			$st->bindValue(":acadyear",$_POST["acad_year"],PDO::PARAM_STR);
			$st->bindValue(":pubyear",$_POST["pub_year"],PDO::PARAM_STR);
			$st->bindValue(":issue",$_POST["issue"],PDO::PARAM_STR);
			$st->bindValue(":vol",$_POST["vol"],PDO::PARAM_STR);
			$st->bindValue(":pgstart",$_POST["pg_start"],PDO::PARAM_STR);
			$st->bindValue(":pgend",$_POST["pg_end"],PDO::PARAM_STR);
			$st->bindValue(":url","../articles/{$id['curr']}.pdf",PDO::PARAM_STR);
			$st->bindValue(":author",$_POST['auth'],PDO::PARAM_STR);
			$st->bindValue(":uploader",$uploader,PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("OOPS! Seems like you submitted an article with the same name before...Resubmission not allowed..sorry...");
			}
                
            $sql="insert into articles(year,title,language,file_size,file_name,file_path) values( :year, :title, :language, :filesize, :filename, :filepath);";
			try
			{
			$st=$conn->prepare($sql);
			$st->bindValue(":year",$_POST["acad_year"],PDO::PARAM_INT);
			$st->bindValue(":title",$_POST["title"],PDO::PARAM_STR);
			$st->bindValue(":language",'english',PDO::PARAM_STR);
			$st->bindValue(":filesize",$_FILES['file']['size'],PDO::PARAM_STR);
			$st->bindValue(":filename","{$id['curr']}.pdf",PDO::PARAM_STR);
			$st->bindValue(":filepath",realpath("../articles/{$id['curr']}.pdf"),PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("failed to add article:".$e->getMessage());
			}
                echo "<br>";
                echo "<br>";	
                
                
                if($st)
                    {
                    echo "<br>Success<br>";
					echo "<a href='insert4.php'>Go back</a>";
                    }
                else
                    {echo "Invalid Entries<br>";
                    echo "<a href='insert4.php'>Go back</a>";
                    }
                }
                }else{
                    echo "Please upload a pdf only!!";
                    echo "<a href='insert4.php'>Go back</a>";
                }
                }
				else
				{
				?>
                
            <form action ="insert4.php" method="POST" enctype="multipart/form-data">
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
			<td>Author:</td><td> <input type= "text" name="auth"></td>
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
			<td>Select File:</td><td><input type="file" name="file" size="5000000"></td>
		</tr>
		</table>
		
		<input type="submit" value="insert" name="ins">
		</form>';
		<?php
		echo $str;
	}
		
		?>
		



		
 
</form>


