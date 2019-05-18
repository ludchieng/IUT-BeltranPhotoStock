<?php
	//Include dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	
	$user = SessionManager::getAuthenticatedUser();
	
	if(isset($_POST['submit-cart'])) {
		switch($_POST['submit-cart']) {
			case 'reset':
				$user->resetCart();
				header('Location: ./client-cart.php');
				break;
			case 'order':
				//TODO
				break;
		}
	}
	if(isset($_GET['indexItem'], $_POST['submit-item'])) {
		$indexItem = $_GET['indexItem'];
		$action = $_POST['submit-item'];
		switch($action) {
			case 'del':
				$user->delFromCart($indexItem);
				header('Location: ./client-cart.php');
				break;
			case 'dup':
				$user->duplicateItemCart($indexItem);
				header('Location: ./client-cart.php');
				break;
		}
	}