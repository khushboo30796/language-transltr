<?php
require_once("dataObject.php");
class Article
{
	private $articleID;
	private $year=1200;
	private $title="";
	private $language="";
	private $file_size=0.0;
	private $file_name;
	private $file_path;
	private $translations=0;
	private $pages=0;
	/*
	__construct()
	task- given the title, loads article info from database
	input- the title of the article as a string
	output- info loaded into the object's variables.
	*/
	
	public function __construct($t)   
	{
	$conn=dataObject::connect();
	$sql="select * from articles where Title= :t;";
	try
	{
	$st=$conn->prepare($sql);
	$st->bindValue(":t",$t,PDO::PARAM_STR);
	$st->execute();
	$row=$st->fetch();
	dataObject::disconnect($conn);
	if($row)
		list($this->articleID,$this->year,$this->title,$this->language,$this->file_size,$this->file_name,$this->file_path,$this->translations,$this->pages)=$row;
	}
	catch(PDOException $e)
	{
		dataObject::disconnect($conn);
		die("failed to retrieve article:".$e->getMessage());
	}
	}
 /*
 split();
	task- splits article pointed by the calling object into pages(.txt format)
	input- none
	output- pages saved in the pages directory
	reqs- download xpdf, copy pdftotext.exe in the articles folder, add path to this dir in bin file
	*/
	public function split()  
	{   
			if($this->pages==0)
			{
		    $page_array=array();
			chdir('../articles');
			$cmd="pdftotext -raw {$this->file_name}";
			exec($cmd);
			
			chdir('../classes');
			$file_path=substr($this->file_path,0,-4);
			$file_path.='.txt';
			$file_path=basename($file_path);
			$file_path="..\\articles\\"."$file_path";
			
			$lines=explode('.',file_get_contents($file_path));
			
			foreach($lines as &$line)
			{
		    $line=strtr($line,"\r","   ");
			$line.='.';
			}
			
			for($i=0;$i<count($lines);$i+=10)
			{
				$temp_arr=array_slice($lines,$i,$i+9);
				$page_content=implode('',$temp_arr);
				$page_no=$i/10+1;
				
				
				$pagehandle=fopen("../pages/{$this->file_name}_{$page_no}.txt",'w');
				fwrite($pagehandle,$page_content);
				fclose($pagehandle);
				$page_path=realpath("../pages/{$this->file_name}_{$page_no}.txt");
				$page_array[$page_no]=$page_path;
			}
			return $page_array;
			}
	}
	 /*
	 loadContent()
	task- returns file path of a particular translation of the article
	input- language of the translation(english or hindi)
	output- file path to the translation
	*/
	public function loadContent($language)  
	{
		$language=strtolower($language);
		if($this->language==$language)
		return $this->file_path;
		else
		{
			$sql="select * from translations where articleID= :a and language= :l;";
			try
			{
			$conn=dataObject::connect();
			$st=$conn->prepare($sql);
			$st->bindValue(':a',$this->articleID,PDO::PARAM_STR);
			$st->bindValue(':l',$language,PDO::PARAM_STR);
			$st->execute();
			$row=$st->fetch();
			dataObject::disconnect($conn);
			return $row['file_path'];
			}
			catch(PDOException $e)
			{
				dataObject::disconnect($conn);
				die("failed to load content:".$e->getMessage());
			}
		}
	}
	/*
	languagesAvailable()
	task- returns languages that a particular article is available in
	input- none
	output- array of all languages
	*/

	public function languagesAvailable()
	{
		$languagesAvailable=array($this->language);
		$sql="select language from translations where articleID= :a;";
		try
			{
			$conn=dataObject::connect();
			$st=$conn->prepare($sql);
			$st->bindValue(':a',$this->articleID,PDO::PARAM_STR);
			$st->execute();
			$rows=$st->fetchAll();
			dataObject::disconnect($conn);
			foreach($rows as $key=>$value)
			$languagesAvailable[]=$value;
			}
			catch(PDOException $e)
			{
				dataObject::disconnect($conn);
				die("failed to retrieve languages:".$e->getMessage());
			}
			return $languagesAvailable;
	}
	public function returnID()
	{
	return $this->articleID;
	}
	public function returnLanguage()
	{
	return $this->language;
	}
}

	
			
				
			
?>
