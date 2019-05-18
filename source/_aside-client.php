<?php
	// Import dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	
  // Load user profile picture
	$user = SessionManager::getAuthenticatedUser();
	if(!isset($user)) {
		header('Location: ./login.php');
	}
	
	// Initialize view variables
	$view['user-picture'] = $user->getPictureSrc();
	$view['user-name'] = $user->getData()['prenom'].' '.$user->getData()['nom'];
?>

<aside>
  <div id="profile-picture">
    <img src="<?= $view['user-picture']?>">
  </div>
  <div class="user-name">
    <?= $view['user-name'] ?>
  </div>
  <ul>
    <li><a href="client-cart.php">Mon panier</a></li>
    <li><a href="client.php">Mes commandes</a></li>
    <li><a href="client-informations.php">Mes informations</a></li>
    <li><a href="client-collections.php">Mes collections privées</a></li>
  </ul>
</aside>
