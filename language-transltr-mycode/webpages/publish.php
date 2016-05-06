<?php
      session_start();
      //echo $_SESSION;
    ?>
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



<p align="right"><a href="adminhome.php">Home</a>  &nbsp; &nbsp;
<center>
<h2>Indian Institute of Technology,Indore</h2>
<h1>KSHIP</h1>
<h3>Assign Translation</h3>
<body style="background-image :url(iitilogo-2.png);
		background-repeat: no-repeat;
		background attachment: fixed;
		background-position: 50% 28%;
		background-size: 500px 800px
		">
<?php
require_once('../classes/Article.php');
$rows=Article::retrieveUnpublished();
if($rows)
{
?>
<table>
<tr>
<th>
Click on any translation for publishing:-
</th>
</tr>
<?php

foreach($rows as $row)
{
?>
<tr>
<td>
<?php echo "<a href="."'"."verifypage1.php?title=".urlencode($row)."&amp;pageno=1&amp;count=0' target="."'"."_blank"."'>".$row."</a>" ?>
</td>
</tr>
<?php }
}
else
echo "No articles available for publishing"; ?>

</table>
</body>
</html>