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
			session_start();
			//echo $_SESSION;
		?>

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
                 if(mime_content_type($_FILES['file']['tmp_name'])==="application/pdf")    {
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
                 {
 
                 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

                    $uploader=$_SESSION['login'];
 
                
                
                $q1="insert into journal values('".$_POST["jname"]."','".$_POST["title"]."','".$_POST["acad_year"]."',".$_POST["pub_year"].",".$_POST["issue"].",".$_POST["vol"].",".$_POST["pg_start"].",".$_POST["pg_end"].",'uploads/". basename( $_FILES['file']['name']) ."','".$_POST["auth"]."','".$uploader."');";
                
                echo "<br>";
                echo $q1;
                echo "<br>";	
                
                
                $r1=$conn->query($q1);
                if($r1)
                    {
                    echo "<br>Success<br>";
                           $q2='insert into author_journal value('.$uploader.',"'.$_POST["title"].'");';
                            $res2=$conn->query($q2);
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

?>