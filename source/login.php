<!DOCTYPE html>
<html lang="fr">
<head>
	<title>CrashTest Page</title>
	<link rel="stylesheet" type="text/css" href="styles/default.css" />
	<link rel="stylesheet" type="text/css" href="styles/content.css" />
</head>
<body>
	<main>
		<h1>Authentification</h1>
		<form id="authentification" action="login.php" method="post">
			<input type="text" name="email" placeholder="E-mail" value=""/><br/>
			<input type="password" name="password" placeholder="Mot de passe"/><br/>
			<input id="connect" type="submit" value="Valider"/>
			<p class="message">Pas enregistré ? <a href="#">S'inscrire</a></p>
		</form>
	</main>
</body>
</html>
