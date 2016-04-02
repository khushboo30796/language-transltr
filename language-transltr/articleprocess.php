<?php
require_once('/classes/Article.php');
$obj=new Article($_POST['articleTitle']);
$path=$obj->loadContent($_POST['language']);
return $path;
?>