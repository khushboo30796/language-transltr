<?php
require_once("dataObject.php");
class Author
{
	private $authorInfo=array();
	/*
	uploadArticle()
	task- uploads article
	input- title, language,year and uploaded file
	output- the article duly saved in directory and added to the database
	*/
	public function uploadArticle($title,$year,$language,$file)
	{
		if(move_uploaded_file($file['tmp_name'],"/articles/{$file_name}.pdf"))         //moves uploaded file to the common article repository
		{
			$conn=dataObject::connect();
			$res=$conn->query("select max(articleID) as curr from articles");
			$id=$res['curr']+1;
			$file_size=$file['size'];
			$file_name="$id";
			$file_path=realpath("/articles/{$file_name}.pdf");
			$sql="insert into articles(year,title,language,file_size,file_name,file_path) values( :year, :title, :language, :filesize, :filename, :filepath);";
			try
			{
			$st=$conn->prepare($sql);
			$st->bindValue(":year",$year,PDO::PARAM_INT);
			$st->bindValue(":title",$title,PDO::PARAM_STR);
			$st->bindValue(":language",$language,PDO::PARAM_STR);
			$st->bindValue(":filesize",$file_size,PDO::PARAM_FLOAT);
			$st->bindValue(":filename",$file_name,PDO::PARAM_STR);
			$st->bindValue(":filepath",$file_path,PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("failed to add article:".$e->getMessage());
			}
			$sql="insert into author_article(articleID,authorID) values( :aid, :authorID);";
			try
			{
			$st=$conn->prepare($sql);
			$st->bindValue("aid",$id,PDO::PARAM_INT);
			$st->bindValue(":authorID",$this->authorInfo['authorID'],PDO::PARAM_STR);
			$st->execute();
			}
			catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("Query failed:".$e->getMessage());
			}
			dataObject::disconnect($conn);
		}
		else
		{
			return 0;
		}
		
	}
	/*
	deletePapers()
	task- remove uploaded papers
	input- array of titles of all articles to be removed
	output- the articles and all their translations duly removed from the database
	
	*/
	public function deletePapers(array $titles)
	{
		
		$sql="delete from articles where title= :title;";
		$conn=dataObject::connect();
		try
		{
		$st=$conn->prepare($sql);
		foreach($titles as $title)
		{
		$st->bindValue(':title',$title,PDO::PARAM_STR);
		$st->execute();
		}
		}
		catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("Query failed:".$e->getMessage());
			}
	}
	/*
	updatePaper()
	task- replace current file of article with another file
	input- article title and new uploaded file
	output- article file replaced in directory
	
	*/
	public function updatePaper($title,$newfile)
	{
		//search
		$conn=dataObject::connect();
		$sql="select * from articles where title= :title;";
		try
		{
		$st=$conn->prepare($sql);
		$st->bindValue(':title',$title,PDO::PARAM_STR);
		$st->execute();
		$row=$st->fetch();
		}
		catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("Query failed:".$e->getMessage());
			}
			
		//delete
		$titles=array();
		$titles[]=$row;
		$this->deletePapers($titles);
		
		//add
		$this->uploadArticle($title,$row['year'],$row['language'],$newfile);
	}
		/*
	updatePaperDetails()
	task- change details of an existing paper
	input- current title, new title, language and year
	output- updated information
	
	*/

	public function updatePaperDetails($title,$newTitle,$newLanguage,$newYear)
	{
		$conn=dataObject::connect();
		$sql="update articles set title= :newtitle, year= :year, language= :language where title= :title;";
		try
		{
		$st=$conn->prepare($sql);
		$st->bindValue(':newtitle',$newTitle,PDO::PARAM_STR);
		$st->bindValue(':title',$title,PDO::PARAM_STR);
		$st->bindValue(':language',$newLanguage,PDO::PARAM_STR);
		$st->bindValue(':year',$newYear,PDO::PARAM_INT);
		$st->execute();
		}
		catch(PDOException $e)
			{
			dataObject::disconnect($conn);
			die("Query failed:".$e->getMessage());
			}
	}
}


		
			
			





























?>
