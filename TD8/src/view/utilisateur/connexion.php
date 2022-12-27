<form method="POST" action='frontController.php?controller=utilisateur&action=connecter'>
	<legend>Se connecter</legend>
	<li>
		<input type="text" name="login" value="<?=$_POST["login"] ?? ""?>" placeholder="Entrez votre nom d'utilisateur"/>
		<label>Nom d'utilisateur</label>
	</li>
	<li>
		<input type="password" name="password" placeholder="Entrez votre mot de passe" pattern=".{3,}">
		<label>Mot de passe</label>
	</li>
	<li>
		<input type="submit" value="Envoyer"/>
	</li>
</form>