<?php
	session_start();
	include('php/frag_functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>CrashTest Page</title>
	<link rel="stylesheet" type="text/css" href="styles/default.css" />
	<link rel="stylesheet" type="text/css" href="styles/content.css" />
</head>
<body>
	<?php //Check user data in session
		if(!isset($_SESSION['user'])) {
			header("Location: ./login.php");
		} else {
			$user = $_SESSION['user'];
		}
	?>
	<?php
		//Connection to database
		$dbUser = "visiteur";
		$dbPassword = "lalala";
		include('php/frag_db-connect.php');
	?>
	<main>
		<h1>Espace client</h1>
		<p>Bonjour <?php echo $user['prenom'].' '.$user['nom'].'.' ?></p>
	</main>
</body>
</html>
