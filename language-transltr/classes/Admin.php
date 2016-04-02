<?php
require_once('Article.php');
require_once('dataObject.php');
class Admin
{
    /*
	assignTranslation()
	task- adds a particular article to the queue for translation
	input- title of the article
	output- pages assigned for translation, added to a csv file(serving as page queue)
	*/
	public function assignTranslation($ArticleTitle)
	{
		//split article
		$obj= new Article($ArticleTitle);
		$page_array= $obj->split();

		//put pages in queue csv
		$queueHandle=fopen("pageQueue.csv",'a');
		foreach($page_array as $no=>$path)
		{
			$record=array($obj->returnID(),$no,$path);
			fputcsv($queueHandle,$record);
		}
		fclose($queueHandle);

		//save pages in database
		$conn=dataObject::connect();
		$sql="insert into pages(articleID,page_no,language,file_name,file_size,file_path) values( :articleID, :page_no, :language, :file_name, :file_size, :file_path);";
		foreach($page_array as $no=>$path)
		{
			try
			{
				$st=$conn->prepare($sql);
				$st->bindValue(":articleID",$obj->returnID(),PDO::PARAM_INT);
				$st->bindValue(":page_no",$no,PDO::PARAM_INT);
				$st->bindValue(":language",$obj->returnLanguage(),PDO::PARAM_STR);
				$st->bindValue(":file_name",basename($path),PDO::PARAM_STR);
				$st->bindValue(":file_size",filesize($path),PDO::PARAM_FLOAT);
				$st->bindValue(":file_path",$path,PDO::PARAM_STR);
				$st->execute();
			}
			catch(PDOException $e)
			{
				dataObject::disconnect($conn);
				die("failed to add page $no:".$e->getMessage());
			}
		}

		//update no_of_pages in article
		$no_of_pages=0;
		foreach($page_array as $no=>$path)
			if($no>$no_of_pages)
				$no_of_pages=$no;
		$sql="update articles set no_of_pages = :no where articleID = :i";
		try
		{
			$st=$conn->prepare($sql);
			$st->bindValue(":no",$no_of_pages,PDO::PARAM_INT);
			$st->bindValue(":i",$obj->returnID(),PDO::PARAM_INT);
			$st->execute();
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("failed to update no of pages:".$e->getMessage());
		}
		dataObject::disconnect($conn);
	}
}

?>