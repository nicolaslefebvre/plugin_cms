<?php


class Utilisateur{
	private $utilisateur;
	private $password;
	private $tableAdmin = 'admin';
	private $db;



	public function __construct($utilisateur="", $password="")
	{
		$this->utilisateur = $utilisateur;
		$this->password = $password;
		$this->db = $this->setDb();
	}


	public function verification()
	{
		$utilisateur = $this->getUtisateur();
		$password = $this->getPassword();

	
		$db_query = $this->db->prepare("SELECT password FROM $this->tableAdmin WHERE pseudo = BINARY '$utilisateur'");
		$db_query->execute();
		$passwordCripte = $db_query->fetch(PDO::FETCH_ASSOC);
		$passwordCripte = $passwordCripte['password'];

		if($this->cryptage($password, $passwordCripte) == $passwordCripte)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	// fonction qui teste si le nom de l'identifiant existe
	public function mdp()
	{
		$utilisateur = $this->utilisateur;

		$db_query = $this->db->prepare("SELECT pseudo FROM $this->tableAdmin WHERE pseudo = BINARY '$utilisateur' ");
		$db_query->execute();
		$verif = $db_query->fetch(PDO::FETCH_ASSOC);
		
		if($verif['pseudo'] != null)
		{
			return $verif['pseudo'];
		}
		else
		{
			return "";
		}

	}

	public function getUtisateur()
	{
		return $this->utilisateur;


	}

	public function getPassword()
	{
		return $this->password;
	}


	public function getDb()
	{
		return $this->db;
	}

	public function setDb()
	{
		$connect = new Base();
		return $connect->db();
	}

	// fonction qui permet de tester si la table admin existe
	public function testAdminExist()
	{
		$req = "SHOW TABLES FROM ".DB_NAME." LIKE '$this->tableAdmin'";
		$req = $this->db->query($req);

		if($req->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// fonction qui permet de creer la table admin + 1 compte superAdmin
	public function createSuperAdmin($login, $pass, $mail)
	{
		$requeteCreate = "CREATE TABLE admin(
			pseudo VARCHAR (50) not null, 
			mail VARCHAR (64) not null ,
			password VARCHAR (150) not null,
			statut VARCHAR (50) not null,
			PRIMARY KEY (pseudo)
			)";
	
		$db_queryCreate = $this->db->prepare($requeteCreate);
		$db_queryCreate->execute();

		$pass = $this->cryptage($pass);

		$requeteInsert = "INSERT INTO admin (pseudo, mail, password, statut) VALUES ('$login', '$mail', '$pass', 'superAdmin')";
		$db_queryInsert = $this->db->prepare($requeteInsert);
		$db_queryInsert->execute();
	}

	// fonction qui permet de creer uncompte admin
	public function createAdmin($login, $pass, $mail)
	{


		$pass = $this->cryptage($pass);
		$requeteInsert = "INSERT INTO admin (pseudo, mail, password, statut) VALUES ('$login', '$mail', '$pass', 'admin')";
		$db_queryInsert = $this->db->prepare($requeteInsert);
		$db_queryInsert->execute();
	}

	// fonction qui permet de savoir si le pseudo est déjà enregistré
	public function ifAdminExist()
	{
		$utilisateur = $this->utilisateur;

		$db_query = $this->db->prepare("SELECT COUNT(*) AS pseudo FROM $this->tableAdmin WHERE pseudo = BINARY '$utilisateur' ");
		$db_query->execute();
		$verif = $db_query->fetch(PDO::FETCH_ASSOC);
		//s'il le pseudo existe deja je retourne vrai
		if($verif['pseudo'] > 0)
		{
			return true;
		}
		//sinon faux
		else
		{
			return false;
		}
	}

	

	// fonction qui permet d'enregistrer dans la bdd le mot de passe crypter
	public function registerNewPassword($newPassword)
	{
		try
		{
			$utilisateur = $this->utilisateur;
			$db_query = $this->db->prepare("UPDATE $this->tableAdmin SET password = '$newPassword' WHERE pseudo = BINARY '$utilisateur' ");
			$db_query->execute();
		}
		catch(Exception $e)
		{
			header("Location: ../admin.php?alert=bdd");
			exit();
		}
	}

	// envoie du mail lors d'une demande de password
	public function sendNewPassword($password)
	{

		$utilisateur = $this->utilisateur;

		$db_query = $this->db->prepare("SELECT mail FROM $this->tableAdmin WHERE pseudo = BINARY '$utilisateur' ");
		$db_query->execute();
		$verif = $db_query->fetch(PDO::FETCH_ASSOC);
		$mail = $verif["mail"];


		$to      =  $mail;
	    $subject = 'Demande de nouveau mot de passe.';
	    $message = 'Bonjour ! 
	    Voici votre nouveau mot de passe : ' . $password.'.
	    Cordialement.';
	    $headers = 'From: nicolalefebvre@yahoo.fr' . "\r\n" .
	    'Reply-To: nicolalefebvre@yahoo.fr' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	     mail($to, $subject, $message, $headers);
	}


	// fonction qui genere le mot de passe non crypté
	function genererMDP ($longueur = 8)
	{
		// initialiser la variable $mdp
		$mdp = "";
	 
		// Définir tout les caractères possibles dans le mot de passe, 
		$chart = array_merge(range('A', 'Z'), range('a','z'), range(0,9));
		for($i = 0 ; $i < $longueur ; $i++)
		{
			$mdp .= $chart[array_rand($chart)];
		}
		return $mdp;
	}

	// fonction qui crypte le mot de passe 
	function cryptage($mdp)
	{
		$salt = "";
		$chart = array_merge(range('A', 'Z'), range('a','z'), range(0,9));
		for($i = 0 ; $i < 22 ; $i++)
		{
			$salt .= $chart[array_rand($chart)];
		}

		return crypt($mdp, '$2a$%07$'.$salt);

	}

	//fonction qui permet de savoir si admin ou superAdmin
	function adminOuSuperadmin()
	{
		$utilisateur = $this->utilisateur;

		$db_query = $this->db->prepare("SELECT statut FROM $this->tableAdmin WHERE pseudo = BINARY '$utilisateur' ");
		$db_query->execute();
		$verif = $db_query->fetch(PDO::FETCH_ASSOC);
		
		if($verif['statut'] == "superAdmin")
		{
			return true;
		}
		else
		{
			return false;
		}
	}



}
	
	






