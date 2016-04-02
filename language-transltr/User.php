<?php
require_once("dataObject.php");
abstract class User
{
	//function: to browse articles based on filter values
	//input:values of strings title author and year
	//output: all associated article and author info pertaining to the above picked up from the database
	
	public static function browseArticle(array $filterValues)
	{
		$title=$filterValues['title'];
		$author=$filterValues['author'];
		$year=$filterValues['year'];
		$conn=dataObject::connect();		
		$sql="select * from authors natural join author_article natural join articles";
		if($author||$title||$year)
			$sql.=" where";
		$count=0;
		if($author)
		{
			$sql.=" authors.name like :author";
			if($title||$year)
				$sql.=" and";
		}
		if($title)
		{
			$sql.=" articles.title like :title";
			if($year)
				$sql.=" and";
		}
		if($year)
			$sql.=" year= :year";
		$sql.=';';
		try
		{
			$st=$conn->prepare($sql);
			if($author)
				$st->bindValue(":author",$author,PDO::PARAM_STR);
			if($year)
				$st->bindValue(":year",$year,PDO::PARAM_INT);
			if($title)
				$st->bindValue(":title",$title,PDO::PARAM_STR);
			$st->execute();
			return $st->fetchAll();
		}
		catch(PDOException $e)
		{
			dataObject::disconnect($conn);
			die("Query failed: ".$e->getMessage());
		}
	}
}


