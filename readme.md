#PLUGIN : ADMIN LOGIN#



1. Installation :
	
	On the website mycms :

	* Put file **pluginsAdmin** in the site root.

	* Add the code line in the file **view/admin/layout/bottom.inc**.

   `<script type="text/javascript" src="pluginsAdmin/ajax/deconnexion.js"></script>`

	* Add the code line in the file view/back/layout/top.inc.php in the menu (below *ajouter*) to add user management.

   `<?php include ("./pluginsAdmin/view/monCompte.php"); ?>`

	* Replace the current file **admin** by the plugin file.


2. How to use it :

	Go on the website mycms.
	
	At the end the url, add admin.php.
	
	On first use, you will be asked to create a superadmin account, which will create the admin table (pseudo ( primary key ) , password, and email ), and the superadmin account.

	When the connection will be made with the superadmin account, it will be possible to create new admin accounts, by clicking on the button of your ID.

	On the login page there is the possibility in case of password loss, to create a new one with your ID. This new password will be sent to the mailbox associated with the pseudo .


	
	
