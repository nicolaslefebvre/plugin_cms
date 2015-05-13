<li>
	<a href='#' class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    	<i class="glyphicon glyphicon-user"></i>
    	<?= " ".$_SESSION['login']?> <span class="caret"></span>
  	</a>
	<ul class="dropdown-menu" role="menu">
		<li><a href="#" id="deconnexion">Deconnexion</a></li>
			<?php if(isset($_SESSION["loginSuperAdmin"])){ ?>
		<li><a href="pluginsAdmin/view/creationCompteAdmin.php" id="deconnexion">Nouveau compte admin</a></li>
			<?php } ?>
	</ul>
</li>