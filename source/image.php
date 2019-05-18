<?php
	session_start();
	// Import dependencies
	use \BeltranPhotoStock\Model\DAO;
	require_once('model/DAO.php');
	
	// Retrieve id_image from GET superglobal variable
	if(isset($_GET['id_image'])) {
		$idImage = preg_replace("/[^0-9]/", "", $_GET['id_image']);
	  // Select image data from database
	  $dao = new DAO();
	  $img = $dao->getImageById($idImage);
	  $tags = $dao->getImageTagsById($idImage);
	  $colors = $dao->getImageColorsById($idImage);
	  if(count($img) == 0) {
			header('Location: ./index.php');
		}
	} else {
	  header('Location: ./index.php');
  }
	
	// Initialize view variables
	$view['titre'] = $img['titre'];
	$view['filename'] = $img['filename'];
	$view['auteur'] = $img['auteur'];
	$view['prixHT'] = $img['prixHT'];
	
	$date = explode("-", $img['datePriseDeVue']);
	$months = ['janv.', 'fév.', 'mars', 'avr.', 'mai', 'juin', 'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'];
	$date[2] = str_replace('0', '', $date[2]);
	$date[1] = str_replace('0', '', $date[1]);
	$view['datePriseDeVue'] = $date[2] . ' ' . $months[$date[1]-1] . ' ' . $date[0];
	
	$view['camera'] = $img['camera'];
	$view['exifs-longueurFocale'] = $img['longueurFocale'];
	$view['exifs-ouverture'] = $img['ouverture'];
	$view['exifs-tpsExpo'] = $img['tpsExpo'];
	$view['exifs-sensibiliteISO'] = $img['sensibiliteISO'];
?>


<?php //###################################################### ?>


<?php $htmlTitle = "Image — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = "./public/styles/_image.css"; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php require('./_search.php'); ?>

<main id="image">
	<div class="container main-content">
		<h1 id="img-title"><?= $view['titre'] ?></h1>
		<span class="separator"></span>
		<div>
			<div class="col-md-8">
				<div id="img-preview">
					<img src="./public/images/<?= $view['filename'] ?>">
				</div>
			</div>
			<form id="img-details" class="col-md-4" action="./addtoCart.php">
				<button id="btn-add-cart" class="btn btn-default btn-blue-dark w-fullW" type="submit" name="submit"><?= $view['prixHT'] ?>€ — Ajouter au panier</button>
				<div id="img-author"><?= $view['auteur'] ?></div>
				<div id="img-date"><?= $view['datePriseDeVue'] ?></div>
				<ul id="img-colors">
						<?php
							foreach($colors as $color) {
								echo '<li style="background-color: #'. $color['hexcode'] .'"></li>';
							}
						?>
				</ul>
				<div id="img-camera"><?= $view['camera'] ?></div>
				<ul id="img-exifs">
					<li><?= $view['exifs-longueurFocale'] ?></li>
					<li><?= $view['exifs-ouverture'] ?><li>
					<li><?= $view['exifs-tpsExpo'] ?></li>
					<li><?= $view['exifs-sensibiliteISO'] ?></li>
				</ul>
			</form>
			<ul id="img-tags" class="col-lg-4">
				<?php
					foreach($tags as $tag) {
						echo '<li>'.ucfirst($tag['label']).'</li>';
					}
				?>
			</ul>
		</div>
	</div>
</main>


<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
