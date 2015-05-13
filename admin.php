<?php

//Fichier de configuration

	include ("config/dbConnect.inc.php");
	include ("config/function.php");
	include ("pluginsAdmin/model/Utilisateur.php");

	//Auto chargement des classes
	spl_autoload_register('chargerClasse');
//On demarre la session
session_start();

if(isset($_GET['deconnexion']))
{
	if($_GET['deconnexion'] == 'ok')
	{
		unset($_SESSION['login']);
	}
}


if(isset($_SESSION['login']))
{


	if(!isset($_GET['admin']))
	{
		$_GET['admin'] = "liste";
	}

	$admin = $_GET['admin'];

if(isset($_GET["back"]))
{
	$_SESSION["alert_creation"] = "";
}




	

	//
	//switcher de vue
	switch ($admin) {
		case 'liste':
			$vue = 'liste';
			$manager = new PageManager();
			break;
		case 'ajout':
			$vue = 'form';
			$titre = '';
			$menuText = '';
			$bouton = "Ajouter";
			break;
		case 'modif' :
			$vue = 'form';
			$manager = new PageManager();
			$page = $manager->read($_GET['id']);
			$titre = $page->titre();
			$menuText = $page->menuText();
			$contenu = $page->contenu();
			$bouton = "Modifier";
			break;
		default:
			$vue = "liste";
			$manager = new PageManager();
			break;
		}


	//Vues
		include "pluginsAdmin/view/modalDeconnexion.php";
		//include "view/admin/layout/confirmerModif.php";
		//include "view/admin/layout/supprimerModal.php";
		include "view/admin/layout/top.inc.php";
		include "view/admin/$vue.inc.php";
		include "view/admin/layout/bottom.inc.php";
}
else
{
	$utilisateur = new Utilisateur();

	if(!$utilisateur->testAdminExist())
	{
		include "./pluginsAdmin/view/creationCompte.php";
	}
	else
	{
		include "./pluginsAdmin/view/connexion.php";
	}
}





