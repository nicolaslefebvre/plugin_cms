<!DOCTYPE html>

<html lang='fr'>
<head>
	<meta charset = "UTF-8">
	<meta name "viewport" content="width=device-width, initial-scale=1">
	<title>My CMS - Administration</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/back/style/style.css">

</head>

<body>

	<div class="jumbotron col-md-8 col-md-offset-2 text-center">
  			<h1>CONNECTEZ VOUS A VOTRE COMPTE</h1>
	</div>


	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php if(isset($_GET['superAdmin'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-success">
			<p>Votre compte SUPER ADMINISTRATEUR est créé !</p>
			<p>Vous pouvez vous connecter !!</p>
			</div>
			<?php }elseif(isset($_GET['empty'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-warning">
			<p>Merci de bien remplir tous les champs</p>
			</div>
			<?php }elseif(isset($_GET['unknown'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-danger">
			<p>Le pseudo ou mot de passe est incorrect</p>
			</div>
			<?php }elseif(isset($_GET['invalid'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-danger">
			<p>Attention aux caractères invalides(Merci de ne saisir que des chiffres et des lettres)</p>
			</div>
			<?php }elseif(isset($_GET['mail'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-success">
			<p>Vous avez reçu votre nouveau mot de passe par mail !!</p>
			</div>
			<?php } ?>


			<form class="form-horizontal col-md-4 col-md-offset-4" id="formAjout" method="POST" action="pluginsAdmin/controller/connectezVous.php">

				<div class="form-group" >
				    <label for="identifiant">Identifiant</label>
				    <input type="text" class="form-control" id="identifiant" placeholder="Votre identifiant" name="identifiant">
				</div>
				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
				</div>
				<div>
  					<button type="submit" class="btn btn-primary col-md-4 col-md-offset-4">VALIDER</button>
				</div>
				<div class="col-md-12 text-center">
					<p><a href="pluginsAdmin/view/mdp.php">Mot de passe perdu!</a></p>
				</div>

 			</form>
 		</div>
 	</div>


 </body>