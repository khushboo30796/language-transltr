<?php

require_once('dataObject.php');
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
			session_start();
			//echo $_SESSION;
		?>

<?php
$conn=dataObject::connect();
echo "<center>";
$t=$_POST['typ'];
//echo $t;
    if(isset($_POST['ins']))
            {
            if($t=="Research Paper")
                {
				$st=$conn->prepare("select max(articleID) as curr from articles");
				$st->execute();
				$id=$st->fetch();
                $targetfolder = "../articles/";
 
                 $targetfolder .= "{$id['curr']}.pdf" ;
				 if($_POST["jname"]==NULL || $_POST["title"]==NULL || $_POST["acad_year"]==NULL || $_POST["pub_year"]==NULL || $_POST["issue"]==NULL || $_POST["vol"]==NULL || $_POST["pg_start"]==NULL || $_POST["pg_end"]==NULL || $_POST["auth"]==NULL){
                    echo "<b>Pleease fill all the values.</b><br>";
                    echo "<a href='insert4.php'>Go back</a>";
                }else if(!(is_numeric($_POST["acad_year"])) || !(is_numeric($_POST["pub_year"])) || !(is_numeric($_POST["issue"])) || !(is_numeric($_POST["vol"])) || !(is_numeric($_POST["pg_start"])) || !(is_numeric($_POST["pg_end"]))){
                    echo "Please enter valid details.<br>";
                    echo "<a href='insert4.php'>Go back</a>";
                }else{
                 if($_FILES['file']['type']=='application/pdf')    {
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
                 {
 
                 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

                    $uploader=$_SESSION['login'];
 
                
                
			
                $q1="insert into journal values('".$_POST["jname"]."','".$_POST["title"]."','".$_POST["acad_year"]."',".$_POST["pub_year"].",".$_POST["issue"].",".$_POST["vol"].",".$_POST["pg_start"].",".$_POST["pg_end"].",'../articles/". "{$id['curr']}" ."','".$_POST["auth"]."','".$uploader."');";
                                $r1=$conn->query($q1);

				$sql="insert into articles(year,title,language,file_size,file_name,file_path) values( :year, :title, :language, :filesize, :filename, :filepath);";
			try
			{
			$st=$conn->prepare($sql);
			$st->bindValue(":year",$_POST["acad_year"],PDO::PARAM_INT);
			$st->bindValue(":title",$_POST["title"],PDO::PARAM_STR);
			$st->bindValue(":language",'english',PDO::PARAM_STR);
			$st->bindValue(":filesize",$_FILES['file']['size'],PDO::PARAM_STR);
			$st->bindValue(":filename","{$id['curr']}",PDO::PARAM_STR);
			$st->bindValue(":filepath",realpath("../articles/{$id['curr']}"),PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("failed to add article:".$e->getMessage());
			}
                echo "<br>";
                echo "<br>";	
                
                
                if($r1)
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
			}
        } 
      

?>