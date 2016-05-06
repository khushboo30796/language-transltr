<?php
      session_start();
      //echo $_SESSION;
    ?>
<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”  “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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

<p align="right"><a href="loginhome1.php">Home</a>  &nbsp; &nbsp;
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h1>KSHIP</h1>
<h3>Translate</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
<?php
require_once('../classes/Page.php');
require_once('../classes/Translator.php');
if(isset($_POST['submit']))
afterSubmit();
else if(isset($_POST['cancel']))
onCancel();
else
displayForm();
function displayForm()
{
$translatorObj=new Translator();
$page_path=$translatorObj->requestToTranslate();
if($page_path)
{
$pageObj=new Page($page_path);
$pageContent=$pageObj->loadContent();
?>
<form action='iwanttotranslate.php' method='post' id='myform'>
<input type='hidden' name='pagepath' id='pagepath' value="<?php echo $page_path ?>">
<div class='container-fluid'>
<div class='row'>
<div class='col-xs-6'>

<p><b>Page:-</b></p>
<textarea name='pageContent' id='pageContent' rows='20' cols='20' style='width:50%' readonly>
<?php echo $pageContent; ?>
</textarea>
</div>
<p><b>Translation:-</b></p>

<script language="javascript">
CreateCustomHindiTextArea("id1","",80,20,true);
</script>

</div>
</div>
<input type='submit' name='submit' value='submit'></input>
<input type='button' name='cancel' value='cancel'></input>
</form>
<?php 
}
else
{
echo 'Hurray!!No pages to translate';
}
}
function afterSubmit()
{
$translatorObj=new Translator();
$translatorObj->submitTranslation($_POST['id1'],$_POST['pagepath']);
echo "submitted Successfully";
}
function onCancel()
{
?>
<h3>You cancelled the submission.</h3>
<a href='authorlogin.php'>Go Back</a>
<?php }
?>
</body>
</html>