<?php
require_once('/classes/Article.php');
$path='';
if(isset($_POST['articleTitle']))
$obj=new Article($_POST['articleTitle']);
if(isset($_POST['language']))
$path=$obj->loadContent($_POST['language']);
return $path;
?>