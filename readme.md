<p style="text-align:center";>#PLUGIN : ADMIN LOGIN#</p>

	1. L'installation : 
	
Dans le site mycms :
* Put file *pluginsAdmin* in the site root.

* Add the code'line in the file *view/admin/layout/bottom.inc*.
    <span style="color: #fb4141"><script type="text/javascript" src="pluginsAdmin/ajax/deconnexion.js"></script></span>

* Add the code'line in the file *view/back/layout/top.inc.php* in the menu (below *ajouter*) to add user management .
    <span style="color: #fb4141"><?php include ("./pluginsAdmin/view/monCompte.php"); ?></script></span>

* Replace the current file *admin* by the plugin file .


	2. His role: 

On first use, you will be asked to create a superadmin account, which will create the admin table (pseudo ( primary key ) , password, and email ), and the superadmin account.

When the connection will be made with the superadmin account, it will be possible to create new admin accounts, by clicking on the button of your ID.

On the login page there is the possibility in case of password loss, to create a new one with your ID. This new password will be sent to the mailbox associated with the pseudo .


	
	