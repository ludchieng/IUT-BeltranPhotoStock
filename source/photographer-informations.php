<?php
	// Import dependencies
	use BeltranPhotoStock\Model\Photographer;
	require_once('model/Photographer.php');
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	
	// Load user object from SESSION
	SessionManager::start();
	$user = SessionManager::getAuthenticatedUser();
	if(! $user instanceof Photographer) {
		header('Location: ./login.php');
	}

?>


<?php //###################################################### ?>


<?php $htmlTitle = "Espace Photographe — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<main class="user-area">
  <?php	require('./_aside-photographer.php'); ?>
  <section>
    <h1>Mes informations personnelles</h1>
  </section>
</main>


<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
