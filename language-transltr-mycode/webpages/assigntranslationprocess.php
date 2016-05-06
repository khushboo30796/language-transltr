<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”  “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>
 <html xmlns=”http://www.w3.org/1999/xhtml” xml:lang=”en” lang=”en”>
<head>
  <title>Translations Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
</head>
<body>
<?php
require_once('../classes/Admin.php');
if(isset($_POST['submit']))
{
$adminObj= new Admin();
if(!empty($_POST['article']))
foreach ($_POST['article'] as $articleTitle)
$adminObj->assignTranslation($articleTitle);
echo "Submitted Successfully";
}
?>
<a href='adminlogin.php'>Go Back</a>
</body>
</html>