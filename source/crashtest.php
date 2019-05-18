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
	
	$client = new Client(array("oi boi"));
	SessionManager::set('c', $client);
	echo SessionManager::get('c')->getData()[0];
?>


<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
