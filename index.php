<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ModelPDO/Model/Database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ModelPDO/MyClass/Personne.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ModelPDO/MyClass/Pays.class.php';
	
	$Database = new Database();
	$connexion = $Database->select(1);
	
	$Personne = new Personne($connexion);
	$PersonneInstance = array();
	
	$PersonneInstance['nom'] = 'GUETIKILA';
	$PersonneInstance['prenom'] = 'Daouda';
	$PersonneInstance['age'] = 21;
	$Personne->add($PersonneInstance);
	
	$PersonneInstance['nom'] = 'OUEDRAOGO';
	$PersonneInstance['prenom'] = 'Salam';
	$PersonneInstance['age'] = 30;
	$Personne->add($PersonneInstance);
	
	$PersonnesListe = $Personne->findAll();
	foreach($PersonnesListe as $PersonneInstance)
		echo implode(' --- ',$PersonneInstance) . '<br>';
	echo '<hr><br>';

	$PersonneInstance = $Personne->findOne(1);
	echo implode(' --- ',$PersonneInstance) . '<br><hr><br>';
	
	$PersonneInstance = $Personne->findOneByField(array('name'=>'nom','value'=>'GUETIKILA'));
	echo implode(' --- ',$PersonneInstance) . '<br><hr><br>';
	
	/* ----------------------------------------- */
	
	$Pays = new Pays($connexion);
	$PaysInstance = array();
	
	$PaysInstance['nom'] = 'Burkina Faso';
	$PaysInstance['capital'] = 'Ouagadougou';
	$PaysInstance['superficie'] = '374000';
	$Pays->add($PaysInstance);
	
	$connexion = $Database->select(2);
	$Pays = new Pays($connexion);
	$Pays->add($PaysInstance);
	
	$PaysInstance['nom'] = 'Cote d\'Ivoire';
	$PaysInstance['capital'] = 'Abidjan';
	$PaysInstance['superficie'] = '400000';
	$Pays->add($PaysInstance);
	
	$PaysInstance['nom'] = 'Ghana';
	$PaysInstance['capital'] = 'Accra';
	$PaysInstance['superficie'] = '220000';
	$Pays->add($PaysInstance);
	
	$connexion = $Database->select(1);
	$Pays = new Pays($connexion);
	$Pays->add($PaysInstance);

	$PaysListe = $Pays->findAll();
	echo 'Liste des pays de la premiere base de donnees<br>';
	foreach($PaysListe as $PaysInstance)
		echo implode(' --- ',$PaysInstance) . '<br>';
	echo '<hr><br>';

	$connexion = $Database->select(2);
	$Pays = new Pays($connexion);
	$PaysListe = $Pays->findAll();
	echo 'Liste des pays de la deuxieme base de donnees<br>';
	foreach($PaysListe as $PaysInstance)
		echo implode(' --- ',$PaysInstance) . '<br>';
	echo '<hr><br>';
