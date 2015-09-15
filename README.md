# ModelPDO
Classes de gestion d'une ou plusieurs base de données avec PHP PDO

Ce projet aide les développeur PHP à s'occuper de l'aspect métier de leur application.

Une simple classe comme celui ci-dessous comporte déjà plusieurs méthodes fonctionnelles 
héritées de la classe mère Model, objet de ce présent projet.
	class Pays extends Model
	{   
		public function __construct($connection)
		{
			parent::__construct($connection,'pays');
		}	
	}
	
Les méthodes disponibles sont:
-------------------------------------------------------------------------------------
/* Prend en paramètre un tableau associatif(le nom des colonnes dans la BD) */
public function add($object = array())

/* Prend en paramètre un tableau associatif(le nom des colonnes à modifier dans la BD) et l'id de l'élément à modifier */
public function update($object = array(),$id)

/* Prend en paramètre un tableau associatif(le nom des colonnes à modifier dans la BD) 
 * et un tableau contenant une colonne et sa valeur */
public function updateByField($object = array(),$field = array('name'=>'','value'=>''))

/* Prend en paramètre l'id de l'élément à trouver dans la base de données */
public function findOne($id)

public function findOneByField($field = array('name'=>'','value'=>''))

/* Trouve le premier élément de la table dans la BD */
public function findFirst()

/* Trouve le dernier élément de la table dans la BD */
public function findLast()

public function findFirstByField($field = array('name'=>'','value'=>''))
public function findLastByField($field = array('name'=>'','value'=>''))
public function findByField($field = array('name'=>'','value'=>''))

/* Retourne tous les éléments de la table de la BD **
public function findAll()

/* Supprime l'élément dont l'id est passé en paramètre dans la BD */
public function delete($id)

public function deleteByField($field = array('name'=>'','value'=>''))

----------------------------------------------------------------------

Il faut noter que la classe sera aussi rapide qui vous la dévéloppé vous même,
et votre code se retouve reduit de beaucoup de chose unitil et vous gagnez en temps
pour vous cnsacrer à autre chose.

Ce n'est pas cool pour vous? Ecrivez moi guetikila@gmail.com pour vous avis

Au lieu de devoir créer cette horible méthode, vous ne faites rien et elle existe déjà:

public function add($something = array())
{
	try 
	{
		$requete = $this->con->prepare("INSERT INTO something SET
														idAuther = :idAuther,
														dateInscription = UTC_TIMESTAMP(),
														dateMiseAjour = UTC_TIMESTAMP(),
														
														dateDebutContrat = :dateDebutContrat,
														dateFinContrat = :dateFinContrat,
														idVille = :idVille,
														idType = :idType,
														idPack = :idPack,
														
														geo_localName = :geo_localName,
														geo_longitude = :geo_longitude,
														geo_lattitude = :geo_lattitude,
														
														nom = :nom,
														initials = :initials,
														adresse = :adresse,
														telephone = :telephone,
														telephoneMobile = :telephoneMobile,
														boitePostale = :boitePostale,
														fax = :fax,
														email = :email,
														description = :description,
														
														siteWeb = :siteWeb,
														devise = :devise,
														slogan = :slogan,
														
														logo = :logo,
														enteteEtat = :enteteEtat,
														arrierePlanBulletin = :arrierePlanBulletin,
														arrierePlanRecu = :arrierePlanRecu,
														
														dateCreation = :dateCreation,
														numeroAgrement = :numeroAgrement,
														nom_anneeScolaire = :nom_anneeScolaire,
														nom_directeur = :nom_directeur,
														nom_comptable = :nom_comptable,
														nom_surveillant = :nom_surveillant,
														nom_senceur = :nom_senceur,
														nom_enseignant = :nom_enseignant,
														nom_eleve = :nom_eleve,
														
														etat = :etat");
														
		$requete->bindValue(':idAuther', $abonnement['idAuther'], PDO::PARAM_INT);	
		
		$requete->bindValue(':dateDebutContrat', $abonnement['dateDebutContrat']);
		$requete->bindValue(':dateFinContrat', $abonnement['dateFinContrat']);
		$requete->bindValue(':idVille', $abonnement['idVille'], PDO::PARAM_INT);
		$requete->bindValue(':idType', $abonnement['idType'], PDO::PARAM_INT);
		$requete->bindValue(':idPack', $abonnement['idPack'], PDO::PARAM_INT);

		$requete->bindValue(':geo_localName', $abonnement['geo_localName']);
		$requete->bindValue(':geo_longitude', $abonnement['geo_longitude']);
		$requete->bindValue(':geo_lattitude', $abonnement['geo_lattitude']);
		
		$requete->bindValue(':nom', $abonnement['nom']);
		$requete->bindValue(':initials', $abonnement['initials']);
		$requete->bindValue(':adresse', $abonnement['adresse']);
		$requete->bindValue(':telephone', $abonnement['telephone']);
		$requete->bindValue(':telephoneMobile', $abonnement['telephoneMobile']);
		$requete->bindValue(':boitePostale', $abonnement['boitePostale']);
		$requete->bindValue(':fax', $abonnement['fax']);
		$requete->bindValue(':email', $abonnement['email']);
		$requete->bindValue(':description', $abonnement['description']);
		
		$requete->bindValue(':siteWeb', $abonnement['siteWeb']);
		$requete->bindValue(':devise', $abonnement['devise']);
		$requete->bindValue(':slogan', $abonnement['slogan']);
		
		$requete->bindValue(':logo', $abonnement['logo']);
		$requete->bindValue(':enteteEtat', $abonnement['enteteEtat']);
		$requete->bindValue(':arrierePlanBulletin', $abonnement['arrierePlanBulletin']);
		$requete->bindValue(':arrierePlanRecu', $abonnement['arrierePlanRecu']);
		
		$requete->bindValue(':dateCreation', $abonnement['dateCreation']);
		$requete->bindValue(':numeroAgrement', $abonnement['numeroAgrement']);
		$requete->bindValue(':nom_anneeScolaire', $abonnement['nom_anneeScolaire']);
		$requete->bindValue(':nom_directeur', $abonnement['nom_directeur']);
		$requete->bindValue(':nom_comptable', $abonnement['nom_comptable']);
		$requete->bindValue(':nom_surveillant', $abonnement['nom_surveillant']);
		$requete->bindValue(':nom_senceur', $abonnement['nom_senceur']);
		$requete->bindValue(':nom_enseignant', $abonnement['nom_enseignant']);
		$requete->bindValue(':nom_eleve', $abonnement['nom_eleve']);
		
		$requete->bindValue(':etat', '4', PDO::PARAM_INT);
		
		$requete->execute();
		return TRUE;
	} 
	catch(Exception $e) { 
		return FALSE; 
	}
}
