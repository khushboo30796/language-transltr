<?php
require_once('dataObject.php');
class Page
{
private $articleID;
private $page_no;
private $language;
private $file_name;
private $file_size;
private $file_path;

public function __construct($page_path)
{
 $conn=dataObject::connect();
 $sql="select articleID,page_no,language,file_size,file_name,file_path from pages where file_path= :file_path;";
 try
	{
			$st=$conn->prepare($sql);
			$st->bindValue(":file_path",$page_path,PDO::PARAM_STR);
			$st->execute();
			$row=$st->fetch();
			if($row)
		    list($this->articleID,$this->page_no,$this->language,$this->file_size,$this->file_name,$this->file_path)=$row;
	}
	catch(PDOException $e)
	{
			dataObject::disconnect($conn);
			die("failed to retrieve page:".$e->getMessage());
	}
}
public function loadContent()
{
	$pageContent=file_get_contents("../pages/{$this->file_name}");
	return $pageContent;
}
public function modifyContent($newContent)
{
	$pageHandle=fopen("../pages/{$this->file_name}",'w');
	fwrite($pageHandle,$newContent);
	fclose($pageHandle);
}
public function loadContentTranslated()
{
	$pageContent=file_get_contents("../translatedPages/{$this->file_name}");
	return $pageContent;
}
public function modifyContentTranslated($newContent)
{
	$pageHandle=fopen("../translatedPages/{$this->file_name}",'w');
	fwrite($pageHandle,$newContent);
	fclose($pageHandle);
}
public function returnpath()
{
return $this->file_path;
}
public function getFileName()
{
return $this->file_name;
}
public function getArticleID()
{
return $this->articleID;
}
public function getPageNo()
{
return $this->page_no;
}
}
?>