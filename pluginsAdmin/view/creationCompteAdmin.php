<?php session_start() ?>

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
  			<h1>CREATION DU COMPTE ADMINISTRATEUR</h1>
	</div>


	<div class="row">
		<?php if(isset($_SESSION["alert_creation"])) 
		{
			if($_SESSION["alert_creation"] != null){
		 ?>
		<div class="col-md-6 col-md-offset-3 text-center alert-dismissible alert-warning">
			<?= $_SESSION["alert_creation"]; ?>
		</div>
		<?php }} ?>
		<div class="col-md-10 col-md-offset-1">
			<form class="form-horizontal col-md-4 col-md-offset-4" id="formAjout" action="../controller/createAdmin.php" method="post">

				<div class="form-group" >
				    <label for="identifiant">Identifiant</label>
				    <input type="text" name="identifiant" class="form-control" id="identifiant" placeholder="Votre identifiant">
				</div>
				<div class="form-group">
				    <label for="email">Mail</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="Votre email">
				</div>
				<div class="form-group">
				    <label for="confirmation">Mail confirmation</label>
				    <input type="email" name="confirmation" class="form-control" id="confirmation" placeholder="Confirmation de votre mail">
				</div>
				<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				</div>
				<div>
  					<button type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4">VALIDER</button>
				  	<a href="../../admin.php?back" class="btn btn-danger col-md-2 col-md-offset-2 glyphicon glyphicon-arrow-left"></A>
				</div>

 			</form>
 		</div>
 	</div>


 </body>