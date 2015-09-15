<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ModelPDO/Model/Model.php';
	class Pays extends Model
	{   
		public function __construct($connection)
		{
			parent::__construct($connection,'pays');
		}	
	}