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
	<?php //Connect to database
		$dbUser = "visiteur";
		$dbPassword = "lalala";
		include('php/frag_db-connect.php');
	?>

	<main>
		<?php include('php/section_search.php') ?>
		<?php
			if(!isset($_GET['search'])) {
				throwError('Unable to GET search');
			}
			if($_GET['search'] == "") {
				header("Location: ./explorer.php");
			}

			$search = explode(" ",$_GET['search']);
			$sqlGetImages = "SELECT DISTINCT I.id_image, I.filename, I.titre, I.datePriseDeVue, I.prixHT, I.camera, I.longueurFocale, I.ouverture, I.tpsExpo, I.sensibiliteISO, I.id_photographe, I.id_theme, I.auteur FROM image I, tag T, posseder IT WHERE I.id_image=IT.id_image AND IT.id_tag=T.id_tag";
			$sqlGetImages .= " AND (T.label LIKE '%".$search['0']."%'";
			$sqlGetImages .= " OR I.titre LIKE '%".array_shift($search)."%'";
			foreach ($search as $word) {
				$sqlGetImages .= " OR T.label LIKE '%".$word."%'";
				$sqlGetImages .= " OR I.titre LIKE '%".$word."%'";
			}
			$sqlGetImages .= ");";
			foreach ($db->query($sqlGetImages)->fetchAll() as $image) {
		?>
		<div class="img-results">
			<img src=<?php echo '"'."images/".$image['filename'].'"' ?>/>
			<div>
				<span class="id_image"><?php echo $image['id_image'] ?></span><br/>
				<span class="titre"><?php echo $image['titre'] ?></span><br/>
				<span class="auteur">
					<?php
						$sqlGetPhotographe = "SELECT P.prenom, P.nom FROM photographe P, image I WHERE P.id_photographe=I.id_photographe AND I.id_photographe=".$image['id_photographe'].";";
						$dbPhotographe = $db->query($sqlGetPhotographe)->fetchAll();
						echo $dbPhotographe['0']['prenom']." ".$dbPhotographe['0']['nom'];
					?>
				</span><br/>
				<span class="datePriseDeVue"><?php echo $image['datePriseDeVue'] ?></span><br/>
				<span class="prixHT"><?php echo $image['prixHT'] ?> €</span><br/>
				<span class="camera"><?php echo $image['camera'] ?></span><br/>
				<span class="longueurFocale"><?php echo $image['longueurFocale'] ?></span>
				<span class="ouverture"><?php echo $image['ouverture'] ?></span>
				<span class="tpsExpo"><?php echo $image['tpsExpo'] ?></span>
				<span class="sensibiliteISO"><?php echo $image['sensibiliteISO'] ?></span><br/>
				<span class="tags">
				<?php
					$sqlGetTags = "SELECT T.label FROM tag T, posseder IT WHERE IT.id_tag=T.id_tag AND IT.id_image = ".$image['id_image'].";";
					foreach($db->query($sqlGetTags)->fetchAll() as $tag) {
						echo $tag['label']." ";
					}
				?>
				</span><br/>
				<span class="colors">
					<?php
						$sqlGetColors = "SELECT IC.hexcode FROM comporter IC WHERE IC.id_image = ".$image['id_image'].";";
						foreach($db->query($sqlGetColors)->fetchAll() as $color) {
							echo '<div class="color-tag" style="background-color:#'.$color['hexcode'].';"></div>';
						}
					?>
				</span>
			</div>
		</div>
		<?php
			}
		?>
	</main>
</body>
</html>
