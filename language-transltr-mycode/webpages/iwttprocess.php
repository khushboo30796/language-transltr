<?php
$translated_content=$_POST['translatedcontent'];
echo $translated_content;
echo $_POST['pagepath'];
$translatorObj=new Translator();
$translatorObj->submitTranslation($translated_content,$_POST['pagepath']);
?>