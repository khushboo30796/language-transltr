<?php
require_once('dataObject.php');
require_once('Author.php');
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
		$queueHandle=fopen("pageQueue.csv",'r');
		$page=fgetcsv($queueHandle);
		fclose($queueHandle);
		return $page[2];
	}
	public function submitTranslation()
	{
	
	}
}
?>

































