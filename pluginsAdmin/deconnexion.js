$(document).ready(function(){


	//liste les element html de la page

	var $deconnexion = $('#deconnexion');


	//lsite les element html du modal

	var $modalDeconnexion = $('#deconnexionModal');
	var $boutondeconnexionModal = $modalDeconnexion.find('.deconnexionOK');

	// liste les evenements de la page


	$deconnexion.click(appelModalDeconnection);

	// liste les evenements du modal

	$boutondeconnexionModal.click(deconnexion);


	//liste les fonctions

	function appelModalDeconnection()
	{
		$modalDeconnexion.modal('toggle');
	}

	function deconnexion()
	{
		var url = "/controller/deconnexion.php";

		$.post(
			url,
			supprimerDone
			);
	}





	
	
	

	function supprimerDone(retour)
	{
		console.log(retour);
		location.reload();
		//Afficher la fenetre modal
	}




});