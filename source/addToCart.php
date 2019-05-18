<?php
	// Import dependencies
	use \BeltranPhotoStock\Model\Client;
	require_once('model/Client.php');
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	
	// Construct Image URL
	$idImage = preg_replace("/[^0-9]/", "",$_POST['id_image']);
	$url = './image.php?id_image='.$idImage;
	
	// Check parameters
	$user = SessionManager::getAuthenticatedUser();
	if(!isset($_POST['id_image'], $user)) {
		header("Location: $url");
	}
	
	// Add to cart
	if($user instanceof Client) {
		$user->addToCart($idImage);
	}
	
	
	header('Location: '.$url.'&addedToCart=true');
	