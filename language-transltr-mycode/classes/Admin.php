<?php
require_once('Article.php');
require_once('dataObject.php');
require_once('Page.php');
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
		
		$queueHandle=fopen("../pages/pageQueue.csv",'a');
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
				$st->bindValue(":file_size",filesize($path),PDO::PARAM_STR);
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
	public function verifyPage($page_path,$page_content)
	{
		$pageObj=new Page($page_path);
		$pageObj->modifyContentTranslated($page_content);
	}
	public function republish($page_path)
	{
		//remove page from database
		$pageObj=new Page($page_path);
		$sql="delete from pages where articleID= :articleID and language = :language and page_no = :page_no;";
		$conn=dataObject::connect();
		try
		{
			$st=$conn->prepare($sql);
			$st->bindValue(":articleID",$pageObj->getArticleID(),PDO::PARAM_INT);
			$st->bindValue(":language",'hindi',PDO::PARAM_STR);
			$st->bindValue(":page_no",$pageObj->getPageNo(),PDO::PARAM_INT);
			$st->execute();
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("failed to remove page:".$e->getMessage());
		}
		
		//remove page from directory
		chmod("../translatedPages/{$pageObj->getFileName()}_translated.txt",0777);
		unlink("../translatedPages/{$pageObj->getFileName()}_translated.txt");
		
		//add page to queue
		$queueHandle=fopen("../pages/pageQueue.csv",'a');
		$record=array($pageObj->getArticleID(),$pageObj->getPageNo(),$page_path);
		fputcsv($queueHandle,$record);
		fclose($queueHandle);
	}
	public function publishArticle($articleID)
	{
	//merge translated page content and create pdf
	$sql='select * from pages where articleID= :articleID and language= :language';
	$conn=dataObject::connect();
		try
		{
			$st=$conn->prepare($sql);
			$st->bindValue(":articleID",$articleID,PDO::PARAM_INT);
			$st->bindValue(":language",'hindi',PDO::PARAM_STR);
			$st->execute();
			$rows=$st->fetchAll();
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("failed to retrieve pages:".$e->getMessage());
		}
		$str='';
		foreach($rows as $row)
		{
		$pageObj=new Page($row['file_path']);
		$str=$pageObj->loadContent();
		}
		require('../classes/fpdf181/fpdf.php');
		$pdf = new FPDF();
		$pdf->SetFont('Arial','',14);
		$pdf->Write(2,$str);
		$pdf->Output('F',"../translations/{$articleID}_translated.pdf");
		
		//Make entry into database
	$sql="insert into translations(articleID,language,file_size,file_name,file_path) values( :articleID, :language, :filesize, :filename, :filepath);";
	try
		{
			$st=$conn->prepare($sql);
			$st->bindValue(":articleID",$articleID,PDO::PARAM_INT);
			$st->bindValue(":language",'hindi',PDO::PARAM_STR);
			$st->bindValue(":filesize",filesize("../translations/{$articleID}_translated.pdf"),PDO::PARAM_INT);
			$st->bindValue(":filename","{$articleID}_translated.pdf",PDO::PARAM_STR);
			$st->bindValue(":filepath",realpath("../translations/{$articleID}_translated.pdf"),PDO::PARAM_STR);
			$st->execute();
			
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("failed to add translation:".$e->getMessage());
		}
	$sql="update articles set no_of_translations = no_of_translations+1 where articleID= :articleID";
	try
		{
			$st=$conn->prepare($sql);
			$st->bindValue(":articleID",$articleID,PDO::PARAM_INT);
			$st->execute();
			
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("failed to update no-of-translations:".$e->getMessage());
		}
	}
}

?>