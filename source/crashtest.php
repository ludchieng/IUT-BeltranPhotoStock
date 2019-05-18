<?php $htmlTitle = "CrashTest — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use \BeltranPhotoStock\Model\Client;
	require_once('model/Client.php');
	use \BeltranPhotoStock\Model\DBConnector;
	require_once('model/DBConnector.php');
	
	$user = SessionManager::getAuthenticatedUser();
	$cart = $user->getCart();
	
	$pass = array(
	  'Haboutt2
'
	);
	
	foreach ($pass as $str) {
	  echo password_hash($str, PASSWORD_BCRYPT).'<br/>';
	}
	
?>


<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
