<?php

session_start();

include ("../../config/dbConnect.inc.php");
include ("../model/Utilisateur.php");
include ("../../model/Base.php");


$utilisateur = new Utilisateur();

$_SESSION["alert_creation"] = "";



if(isset($_POST['identifiant']) AND isset($_POST['password']) AND isset($_POST['email']) AND isset($_POST['confirmation']))
{

	$message = "";
	if(empty($_POST['identifiant']))
	{
		$message .= "<p>Merci de saisir un identifiant.</p>";
	}
	if(empty($_POST['password']))
	{
		$message .= "<p>Merci de saisir un mot de passe.</p>";

	}if(empty($_POST['email']))
	{
		$message .= "<p>Merci de saisir une adresse email.</p>";
	}
	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) != 1)	
	{
		$message .= "<p>Merci de saisir une adresse mail valide.</p>";
	}
	if(preg_match("/^[a-zA-Z0-9]{8,}$/", $_POST['password']) != 1)
	{
		$message .= "<p>Merci de saisir un password avec 8 caractères minimums (uniquement des chiffres et des lettres).</p>";
	}
	if(preg_match("/^[a-zA-Z0-9]{6,}$/", $_POST['identifiant']) != 1)
	{
		$message .= "<p>Merci de saisir un identifiant avec 6 caractères minimums(uniquement des chiffres et des lettres).</p>";
	}
	if(strcmp($_POST['email'], $_POST['confirmation']) !== 0)
	{
		$message .= "<p>Attention : Différence entre les 2 adresses mail saisies.</p>";
	}


	if($message != "")
	{
		$_SESSION["alert_creation"] = $message;
		header("Location: ../../admin.php");
	}
	else
	{
		$login = (strip_tags(trim($_POST["identifiant"])));
		$pass = (strip_tags(trim($_POST["password"])));
		$mail = (strip_tags(trim($_POST["email"])));

		$utilisateur->createSuperAdmin($login, $pass, $mail);
		unset($_SESSION["alert-creation"]);
		header("Location: ../../admin.php?superAdmin");


	}
}

















