<?php
	/**
	 * Classe gérant les connection aux bases de données.
	 * Centralise les services d'accès à une base de données.
	 * Utilise l'API PDO de PHP
	 *
	 * @version 1.0
	 * @author Daouda GUETIKILA
	 */
	class Database {

		/** Un tableau contenant les URL des différentes bases de données  */
		private $_databases = array('1' => array("DB_DSN"  => "mysql:host=localhost;port=3306;dbname=nanaphp1",
														"DB_USER" => "root",
														"DB_PWD"  => "",
														"DB_ID"   => "1"),
											'2' => array("DB_DSN"  => "mysql:host=localhost;port=3306;dbname=nanaphp2",
														 "DB_USER" => "root",
														 "DB_PWD"  => "",
														 "DB_ID"   => "2"),
											);	
		
		/** Objet PDO d'accès à la BD  */
		private $_connection = array('1' => null, '2' => null);
		
		/**
		 * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
		 * 
		 * @return array Tableau contenant les paramètres de connexion à la BD
		 *
		 * @param int $DB_ID L'identifiant de la base de données utilisée
		 */		
		private function selectDatabase($DB_ID = 1)
		{
			foreach($this->_databases as $database) 
			{
				if($database['DB_ID'] == $DB_ID) return $database;
			}
		}
		
		/**
		 * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
		 * 
		 * @return PDO Objet PDO de connexion à la BDD
		 *
		 * @param int $DB_ID L'identifiant de la base de données utilisée
		 */
		public function select($DB_ID = 1) 
		{
			if ($this->_connection[$DB_ID] === null) 
			{
				// Récupération des paramètres de configuration BD
				$selectedDatabase = $this->selectDatabase($DB_ID);
				
				// Création de la connexion
				try {
					$this->_connection[$DB_ID] = new PDO($selectedDatabase['DB_DSN'], 
												 $selectedDatabase['DB_USER'], 
												 $selectedDatabase['DB_PWD'],
												array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_AUTOCOMMIT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",));	
				}
				catch(PDOException $e){
					throw new Exception($e->getMessage());
				}
			}			
			return $this->_connection[$DB_ID];
		}
	}