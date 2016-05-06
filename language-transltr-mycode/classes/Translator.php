<?php
require_once('dataObject.php');
require_once('Author.php');
require_once('Page.php');
class Translator extends Author
{
	/*
	requestToTranslate()
	task- retrieve topmost page in pagequeue
	input- none
	output- path of the page to be loaded
	*/
	public function requestToTranslate()
	{
		//return page path of the topmost page in queue
		$queueHandle=fopen("../pages/pageQueue.csv",'r');
		$page=fgetcsv($queueHandle);
		fclose($queueHandle);
		return $page[2];
	}
	public function submitTranslation($translated_content,$page_path)
	{
		$ourPage= new Page($page_path);
		
		//remove first entry from queue csv
		
		$queueHandle=fopen("../pages/pageQueue.csv",'r');
		$currpage=fgetcsv($queueHandle);
		$newQueue=fopen("../pages/pageQueue2.csv",'w');
		while($record=fgetcsv($queueHandle))
			fputcsv($newQueue,$record);
			fclose($queueHandle);
		fclose($newQueue);
			chmod("../pages/pageQueue.csv",0777);
		unlink("../pages/pageQueue.csv");
		rename("../pages/pageQueue2.csv","../pages/pageQueue.csv");
		
		
		//save new page in directory
		
			$pagehandle=fopen("../translatedPages/{$ourPage->getFileName()}_translated.txt",'w');
				fwrite($pagehandle,$translated_content);
				fclose($pagehandle);
				
		//make entry into database
		
		$conn=dataObject::connect();
		$sql="insert into pages(articleID,page_no,language,file_name,file_size,file_path) values( :articleID, :page_no,".'"hindi",'.":file_name, :file_size, :file_path);";
		try
			{
			$st=$conn->prepare($sql);
			$st->bindValue(":articleID",$ourPage->getarticleID(),PDO::PARAM_INT);
			$st->bindValue(":page_no",$ourPage->getpageNo(),PDO::PARAM_INT);
			$st->bindValue(":file_name","{$ourPage->getFileName()}_translated.txt",PDO::PARAM_STR);
			$st->bindValue(":file_size",filesize("../translatedPages/{$ourPage->getFileName()}_translated.txt"),PDO::PARAM_STR);
			$st->bindValue(":file_path",realpath("../translatedPages/{$ourPage->getFileName()}_translated.txt"),PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("failed to add page:".$e->getMessage());
			}
		dataObject::disconnect($conn);
}
}
?>

































