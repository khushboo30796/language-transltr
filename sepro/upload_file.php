<?php
 
 $targetfolder = "/var/www/html/sepro/uploads/";
 
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
 {
 
 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
 
 }
 
 else {
 
 echo "Problem uploading file";
 echo "<br>".$_FILES['file']['error']."";
  }
 
 ?>
