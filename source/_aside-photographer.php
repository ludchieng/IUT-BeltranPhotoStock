<?php
	// Import dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use \BeltranPhotoStock\Model\Photographer;
	require_once('model/Photographer.php');
	
	// Load user object from SESSION
	if(!isset($user)) {
		$user = SessionManager::getAuthenticatedUser();
		if(!$user instanceof Photographer) {
			header('Location: ./login.php');
		}
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
	  <?= $view['user-name']?>
  </div>
  <ul>
    <li><a href="photographer.php">Mes images</a></li>
    <li><a href="photographer-collections.php">Mes collections privées</a></li>
    <li><a href="photographer-informations.php">Mes informations</a></li>
    <li><a href="photographer-revenue.php">Mes recettes</a></li>
  </ul>
</aside>
