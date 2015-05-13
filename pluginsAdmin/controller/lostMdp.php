<?php


include ("../../config/dbConnect.inc.php");
include ("../model/Utilisateur.php");
include ("../../model/Base.php");


if(isset($_POST['identifiant']) AND !empty($_POST['identifiant']))
{
	if(preg_match("/^[a-zA-Z0-9]{6,}$/", $_POST['identifiant']))
	{
		$identifiant = (strip_tags($_POST['identifiant']));

		$utilisateur = new Utilisateur($identifiant, "");
		$resultat = $utilisateur->mdp();
		echo $resultat;

		if($resultat == "")
		{
			header("Location: ../view/mdp.php?unknown");
		}
		else
		{
		// nombre de caratère du mot de passe entre 8 et 12 caractères	
		$nbreCaractere = rand(8, 12);

		// On génère le mot de pass avec la fonction 'geneereMDP'
		$password = $utilisateur->genererMDP($nbreCaractere);

		// On crypt le mot de passe avec la fonction 'crypt'
		$passwordCrypt = $utilisateur->cryptage($password);

		// On enregistre le mot de passe crypté dans la bdd avec la fonction 'registerNewPassword'
		$utilisateur->registerNewPassword($passwordCrypt);

		// On envoie le password non crypté par mail à l'interressé avec la fonction mailPassword
		$utilisateur->sendNewPassword($password);

		header("Location: ../../admin.php?mail");
		}

		
	}
	else
	{
		header("Location: ../view/mdp.php?invalid");
	}
}
else
{
	header("Location: ../view/mdp.php?empty");
}

	




