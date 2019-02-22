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
	<?php
		//Connection to database
		$dbUser = "visiteur";
		$dbPassword = "lalala";
		include('php/frag_db-connect.php');
	?>
	<main>
		<?php include('php/section_search.php') ?>
	</main>
</body>
</html>
