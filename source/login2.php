<!DOCTYPE html>
<html lang="fr">
<head>
	<title>CrashTest Page</title>
	<link rel="stylesheet" type="text/css" href="styles/default.css" />
	<link rel="stylesheet" type="text/css" href="styles/content.css" />
</head>
<body>
	<?php
		//Import php functions
		include('php/frag_functions.php');
		//Connection to database
		$dbUser = "visiteur";
		$dbPassword = "lalala";
		include('php/frag_db-connect.php');
		//Start Session
		session_start();
	?>
	<?php
		//Check POST variables content
		if($_POST['password'], $_POST['email'])) {
			//Execute SQL query
			$client = $db->query("SELECT * FROM client WHERE email = \"".$_POST['email']."\"")->fetchAll();
			//Check if email appears only once in database
			if (count($client) > 1) {
				throwError("Email duplication in database");
				die();
			}
			//Redirect to client.php if password is correct
			if($client['0']['disponible'] == "1" && isset($client['0']['hashIdentifiants']) && $client['0']['hashIdentifiants'] == $_POST['password']) {
				$_SESSION['user'] = $client['0'];
				header("Location: ./client.php");
			}
		}
	?>
	<main>
		<h1>Authentification</h1>
    <form action="login2.php" method="post">
			<?php
			 	if(isset($client['0']['hashIdentifiants']) && $client['0']['hashIdentifiants'] != $_POST['password']) {
					echo "Mauvais mot de passe.<br/>";
				}
				if(!isset($client['0']['hashIdentifiants']) && isset($_POST['email'])) {
					echo "Email non enregistré.<br/>";
				}
				if(isset($client['0']['disponible']) && $client['0']['disponible'] == "0") {
					echo "Compte désactivé.<br/>";
				}
			?>
      <input type="text" name="email" placeholder="E-mail" value=<?php preFillInputField('email');?>><br/>
      <input type="password" name="password" placeholder="Mot de passe"><br/>
      <input id="connect" type="submit" value="Valider">
      <p class="message">Pas enregistré ? <a href="#">S'inscrire</a></p>
    </form>
	</main>
</body>
</html>
