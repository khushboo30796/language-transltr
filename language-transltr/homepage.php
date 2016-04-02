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
  <script>
 function displayArticle()
  {
  var xhttp;
  var geturl;
  if(Window.XMLHttpRequest)
  xhttp= new XMLHttpRequest();
  else
  xhttp= new ActiveXObject("Microsoft.XMLHTTP);
  xhttp.onreadystatechange = function() {
  if (xhttp.readyState == 4 && xhttp.status == 200) {
     geturl=xhttp.responseText;
  }
};
  xhttp.open("GET", "articleprocess.php?t=" + Math.random(), true);
  xhttp.send();
  window.addEvent("domready",function(){
                var pdfRequest = new Request({
                    url:geturl,
                    onSuccess:function(response){
                      var blob=new Blob([response]);
            var link=document.createElement('a');
            link.href=window.URL.createObjectURL(blob);
            link.download="Article_"+new Date()+".pdf";
            link.click();  
                       
                    }
                }).send(); 
            });
  
  
  }
  </script>
</head>


<div class="page_header">
<span><img src="iitilogo-2.png" style="width:100px;height:100px"></img></span>
<span><h1>INDIAN INSTITUTE OF TECHNOLOGY,INDORE</h1></span>
<span><a href="login.php">Login as User</a></span>
<span><a href="loginAsAdmin.php">Login as Admin</a></span>
</div>


<form action="homepage.php" method='get'>
<label for='title'>Filter results by title</label>
<input type="text" name="title"></input>
<label for='author'>Filter results by author</label>
<input type="text" name="author"></input>
<label for='year'>Select year</label>
<select name='year'>
<?php
for($y=2009;$y<=date('Y');$y++) {
?>
<option value="<?php echo $y; ?>">
<?php echo $y; ?>
</option>
<?php } ?>
</select>
<input type='submit' value='submit'></input>
</form>


<?php
require_once('/classes/User.php');
require_once('/classes/Article.php');
if(!isset($_GET['title']))
$_GET['title']='';
if(!isset($_GET['author']))
$_GET['author']='';
if(!isset($_GET['year']))
$_GET['year']='';
$filterValues=array('title'=>$_GET['title'],'author'=>$_GET['author'],'year'=>$_GET['year']);
$articles=User::browseArticle($filterValues);
?>


<table style='width:100%'>
<?php 
foreach($articles as $article)
{
$obj= new Article($article['Title']);
$languagesAvailable=$obj->languagesAvailable();
?>
<tr>
<td>
<?php echo "{$article['Title']},{$article['name']},{$article['year']}" ?>
</td>
<td>
<form action="articleprocess.php" method='post' onsubmit="displayArticle()">
<select name='language'>
<?php foreach($languagesAvailable as $language) { ?>
<option value='<?php echo "$language" ?>'><?php echo "$language" ?></option>
<?php } ?>
</select>
<input type='hidden' name='articleTitle' value ="<?php echo $article['Title'];?>"></input>
<input type='submit' name='view' value='view'>View</input>
</form>
</td>
</tr>
<?php 
 }
?>
</table>


 </body>
</html>
