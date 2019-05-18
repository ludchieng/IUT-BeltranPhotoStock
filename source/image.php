<?php
	session_start();
	// Import dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use \BeltranPhotoStock\Model\DAO;
	require_once('model/DAO.php');
	use \BeltranPhotoStock\Model\Photographer;
	require_once('model/Photographer.php');
	
	// Retrieve usertype
	$user = SessionManager::getUser();
	$usertype = SessionManager::getUserType();
	
	// Retrieve id_image from GET
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
	$view['id_image'] = $img['id_image'];
	$view['titre'] = $img['titre'];
	$view['filename'] = $img['filename'];
	$photographer = DAO::getPhotographerById($img['id_photographe'])->getData();
	$view['photographer'] = $photographer['prenom'].' '.$photographer['nom'];
	$view['prixHT'] = $img['prixHT'];
	
	if(isset($img['datePriseDeVue'])) {
	$date = explode("-", $img['datePriseDeVue']);
	$months = ['janv.', 'fév.', 'mars', 'avr.', 'mai', 'juin', 'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'];
	$date[2] = str_replace('0', '', $date[2]);
	$date[1] = str_replace('0', '', $date[1]);
	$view['datePriseDeVue'] = $date[2] . ' ' . $months[$date[1]-1] . ' ' . $date[0];
  } else {
	  $view['datePriseDeVue'] = '';
	}
	
	$view['camera'] = $img['camera'];
	$view['exifs-longueurFocale'] = $img['longueurFocale'];
	$view['exifs-ouverture'] = $img['ouverture'];
	$view['exifs-tpsExpo'] = $img['tpsExpo'];
	$view['exifs-sensibiliteISO'] = $img['sensibiliteISO'];
	
	// Retrieve addedToCart from GET
	if(isset($_GET['addedToCart']) && $_GET['addedToCart'] == 'true') {
		$addedToCart = true;
	} else {
		$addedToCart = false;
	}
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
			<div id="img-details" class="col-md-4">
		  <?php
			  if($usertype == 'client') {
				  ?>
								<form action="./addToCart.php" method="post">
									<input type="hidden" name="id_image" value="<?= $view['id_image'] ?>">
										<?php
											if($addedToCart) {
												echo '<div id="info-addToCart">Ajouté au panier</div>';
											} else {
												echo '<button id="btn-add-cart" class="btn btn-default btn-blue-dark w-fullW" type="submit" name="submit">'.$view['prixHT'].'€ HT — Ajouter au panier</button>';
											}
										?>
								</form>
				  <?php
			  } else {
				  ?>
								<div id="img-price"><?= $view['prixHT'] ?>€ HT</div>
				  <?php
			  }
		  ?>
				<div id="img-author"><?= $view['photographer'] ?></div>
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
				<ul id="img-tags">
			<?php
				foreach($tags as $tag) {
					echo '<li>'.ucfirst($tag['label']).'</li>';
				}
			?>
				</ul>
			</div>
		</div>
	</div>
</main>


<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
