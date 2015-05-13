<?php


session_start();

include ("../../config/dbConnect.inc.php");
include ("../model/Utilisateur.php");
include ("../../model/Base.php");







if(!empty($_POST['identifiant']) AND !empty($_POST['password']))
{
	if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['identifiant']) AND preg_match("/^[a-zA-Z0-9]+$/", $_POST['password']))
	{
		$identifiant = strip_tags($_POST['identifiant']);
		$password = strip_tags($_POST['password']);

		$utilisateur = new Utilisateur($identifiant, $password);

		if($utilisateur->verification())
		{
			//si je suis superAdmin
			if($utilisateur->adminOuSuperadmin())
			{
				$_SESSION['login'] = $_POST['identifiant'];
				$_SESSION['loginSuperAdmin'] = "true";
				header("Location: ../../admin.php");
			}
			else
			{
				$_SESSION['login'] = $_POST['identifiant'];
				header("Location: ../../admin.php");
			}
		}
		else
		{
			header("Location: ../../admin.php?unknown");
		}
	}
	else
	{
		header("Location: ../../admin.php?invalid");
	}
}
else
{
	header("Location: ../../admin.php?empty");
}














