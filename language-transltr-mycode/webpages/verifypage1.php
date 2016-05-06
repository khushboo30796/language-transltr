<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”  “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>
 <html xmlns="http://www.w3.org/1999/xhtml” xml:lang=”en" lang="en">
<head>
  <title>Translations Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
    <script src="http://www.hinkhoj.com/common/js/keyboard.js"></script>
<link rel="stylesheet" type="text/css"
href="http://www.hinkhoj.com/common/css/keyboard.css" />
</head>
<?php session_start();
?>
<p align="right"><a href="adminhome.php">Home</a>  &nbsp; &nbsp;
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h1>KSHIP</h1>
<h3>Verify Pages for Article</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">

<?php
require_once('dataObject.php');
require_once('../classes/Article.php');
require_once('../classes/Admin.php');
require_once('../classes/Page.php');
$title=$_GET['title'];
$pageno=$_GET['pageno'];
$count=$_GET['count'];
$conn=dataObject::connect();
$adminObj=new Admin();
$articleObj=new Article($title);
$sql='select no_of_pages from articles where Title= :title';
try
{
	$st=$conn->prepare($sql);
	$st->bindValue(":title",$title,PDO::PARAM_INT);
	$st->execute();
	$row=$st->fetch();
}
catch(PDOException $e)
{
	dataObject::disconnect($conn);
	die("dfailed to retrieve:".$e->getMessage());
}
$num=$row['no_of_pages'];

if(isset($_POST['finalize']))
{
	$pageno++;
	$adminObj->verifyPage($_POST['pagepath'],$_POST['hindiContent']);
	$count++;
	unset($_POST['finalize']);
	$nextLink="Location: verifypage1.php?title=".urlencode($title)."&pageno=$pageno&count=$count";
	header($nextLink);
}
else if(isset($_POST['requeue']))
{
	$pageno++;
	$adminObj->republish($_POST['pagenewpath']);
	unset($_POST['requeue']);
	$nextLink="Location: verifypage1.php?title=".urlencode($title)."&pageno=$pageno&count=$count";
	header($nextLink);
}
else if($pageno>$num)
{
if($count==$num)
{
	$adminObj->publishArticle($articleObj->returnID());
echo 'Congo!!Translation published';
}
else
{
echo 'Finished with this article';
}
}
else
{
	$sql='select file_path from pages where articleID= :articleID and page_no= :pageno and language= :language';
	try
{
	$st=$conn->prepare($sql);
	$st->bindValue(":articleID",$articleObj->returnID(),PDO::PARAM_INT);
	$st->bindValue(":pageno",$pageno,PDO::PARAM_INT);
	$st->bindValue(":language",'english',PDO::PARAM_STR);
	$st->execute();
	$row=$st->fetch();
}
catch(PDOException $e)
{
	dataObject::disconnect($conn);
	die("failed to retrieve:".$e->getMessage());
}
	$EPageObj= new Page($row['file_path']);

try
{
	$st=$conn->prepare($sql);
	$st->bindValue(":articleID",$articleObj->returnID(),PDO::PARAM_INT);
	$st->bindValue(":pageno",$pageno,PDO::PARAM_INT);
	$st->bindValue(":language",'hindi',PDO::PARAM_STR);
	$st->execute();
	$row=$st->fetch();
}
catch(PDOException $e)
{
	dataObject::disconnect($conn);
	die("failed to retrieve:".$e->getMessage());
}
	$HPageObj= new Page($row['file_path']);
	$formaction= "verifypage1.php?title=".urlencode($title)."&amp;pageno=".urlencode($pageno)."&amp;count=".urlencode($count);
	?>
	<div class='container-fluid'>
	<form action='<?php echo $formaction;?>' method='post'>
	<div class='row'>
	<div class='col-xs-6'>
	<textarea name='englishContent' id='englishContent' rows='20' cols='40' readonly>
	<?php echo $EPageObj->loadContent(); ?>
	</textarea>
	</div>
	
	<div class='col-xs-6'>
	<script language="javascript">
	var val="<?php echo $HPageObj->loadContentTranslated() ?>";
	CreateCustomHindiTextArea("hindiContent",val,80,20,true);
	</script>
	</div>
	</div>
	<div class='row'>
	<input type='hidden' name='pagenewpath' value='<?php echo $EPageObj->returnpath(); ?>'></input>
	<input type='hidden' name='pagepath' value='<?php echo $row['file_path']; ?>'></input>
	<input type='submit' name='finalize' value='Finalize'></input>
	<input type='submit' name='requeue' value='Requeue'></input>
	</div>
	</form>
	</div>
			<?php 
		}




?>