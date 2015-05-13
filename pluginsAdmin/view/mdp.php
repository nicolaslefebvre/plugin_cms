<!DOCTYPE html>

<html lang='en'>
<head>
	<meta charset = "UTF-8">
	<meta name "viewport" content="width=device-width, initial-scale=1">
	<title>My CMS - Administration</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/back/style/style.css">

</head>

<body>

	<div class="jumbotron col-md-8 col-md-offset-2 text-center">
  			<h1>MOT DE PASSE PERDU</h1>
	</div>


	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php if(isset($_GET['unknown'])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-danger">
			<p>L'identifiant est inconnu</p>
			</div>
			<?php }elseif(isset($_GET["invalid"])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-warning">
			<p>La saisie est invalide (il faut au minimum 6 caractères)</p>
			</div>
			<?php }elseif(isset($_GET["empty"])){ ?>
			<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-warning">
			<p>Merci de saisir votre identifiant</p>
			</div>
			<?php }?>



			<form class="form-horizontal col-md-4 col-md-offset-4" id="formAjout" method="POST" action="../controller/lostMdp.php">

				<div class="form-group" >
				    <label for="email">Votre identifiant</label>
				    <input type="text" class="form-control" id="identifiant" placeholder="Votre identifiant" name="identifiant">
				</div>
				
				<div>
  					<button type="submit" class="btn btn-primary col-md-4 col-md-offset-4">VALIDER</button>
				</div>
				<div class="col-md-12 text-center">
					<p><a href="../../admin.php">Connectez-vous!</a></p>
				</div>

 			</form>
 		</div>
 	</div>


 </body>