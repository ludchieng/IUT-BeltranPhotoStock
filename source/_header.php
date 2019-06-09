<?php
	// Import dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use BeltranPhotoStock\Model\User;
	require_once('./model/User.php');
	use BeltranPhotoStock\Model\Visitor;
	require_once('./model/Visitor.php');
	use BeltranPhotoStock\Model\Admin;
	require_once('./model/Admin.php');
	use BeltranPhotoStock\Model\Client;
	require_once('./model/Client.php');
	use BeltranPhotoStock\Model\Photographer;
	require_once('./model/Photographer.php');
	
	// Load user data from SESSION
	if(!isset($user)) {
		$user = SessionManager::getUser();
	}
	if(!isset($userType)) {
		$userType = SessionManager::getUserType();
	}
	
	// Initialize view variables
	if($user instanceof User) {
		$userData = $user->getData();
	}
	if(isset($userData['prenom'], $userData['nom'])) {
		$view['userName'] = $userData['prenom'].' '.$userData['nom'];
	}
	
?>


<header>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="logo" class="navbar-header">
					<a class="navbar-brand" href="./index.php">BeltranPhotoStock</a>
				</div>
			</div>
		
		<?php
			switch($userType) {
				case 'client':
					$view['cart-count'] = count($user->getCart());
					?>
									<div class="collapse navbar-collapse" id="myNavbar">
										<ul class="nav navbar-nav">
										</ul>
										<ul class="nav navbar-nav navbar-right">
											<li><a href="./index.php">Explorer</a></li>
											<li><a href="./themes.php">Thèmes</a></li>
											<li><a href="./events.php">Événements</a></li>
											<li><a href="#">Collections privées</a></li>
											<li>
												<a href="./client-cart.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-panier.svg">
													</div>
													<span id="cart-count"><?= $view['cart-count'] ?></span>
													<span class="alt-collapsed">Panier d'achat</span>
												</a>
											</li>
											<li class="navbar-account">
												<a href="./client.php">
													<span class="alt-fullwidth"><?= $view['userName'] ?></span>
													<div class="nav-icon">
														<img src="./public/assets/icon-client.svg">
													</div>
													<span class="alt-collapsed">Espace client</span>
												</a>
											</li>
											<li>
												<a href="./logout.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-logout.svg">
													</div>
													<span class="alt-collapsed">Se déconnecter</span>
												</a>
											</li>
										</ul>
									</div>
					<?php
					break;
				case 'photographer':
					?>
									<div class="collapse navbar-collapse" id="myNavbar">
										<ul class="nav navbar-nav">
										</ul>
										<ul class="nav navbar-nav navbar-right">
											<li><a href="./index.php">Explorer</a></li>
											<li><a href="./themes.php">Thèmes</a></li>
											<li><a href="./events.php">Événements</a></li>
											<li><a href="./photographer.php">Mes images</a></li>
											<li>
												<a href="./photographer-upload.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-upload.svg">
													</div>
													<span class="alt-collapsed">Ajouter des images</span>
												</a>
											</li>
											<li class="navbar-account">
												<a href="./photographer.php">
													<span class="alt-fullwidth"><?= $view['userName'] ?></span>
													<div class="nav-icon">
														<img src="./public/assets/icon-photographe.svg">
													</div>
													<span class="alt-collapsed">Espace photographe</span>
												</a>
											</li>
											<li>
												<a href="./logout.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-logout.svg">
													</div>
													<span class="alt-collapsed">Se déconnecter</span>
												</a>
											</li>
										</ul>
									</div>
					<?php
					break;
				case 'admin':
					?>
									<div class="collapse navbar-collapse" id="myNavbar">
										<ul class="nav navbar-nav">
										</ul>
										<ul class="nav navbar-nav navbar-right">
											<li><a href="./index.php">Images</a></li>
											<li><a href="./events.php">Événements</a></li>
											<li><a href="./admin-photographers.php">Photographes</a></li>
											<li><a href="./admin-clients.php">Clients</a></li>
											<li class="navbar-account">
												<a href="./admin.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-admin.svg">
													</div>
													<span class="alt-collapsed">Espace administration</span>
												</a>
											</li>
											<li>
												<a href="./logout.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-logout.svg">
													</div>
													<span class="alt-collapsed">Se déconnecter</span>
												</a>
											</li>
										</ul>
									</div>
					<?php
					break;
				default:
					?>
									<div class="collapse navbar-collapse" id="myNavbar">
										<ul class="nav navbar-nav">
										</ul>
										<ul class="nav navbar-nav navbar-right">
											<li><a href="./index.php">Explorer</a></li>
											<li><a href="./themes.php">Thèmes</a></li>
											<li><a href="./events.php">Événements</a></li>
											<li>
											</li>
											<li class="navbar-account">
												<a href="./login.php">
													<div class="nav-icon">
														<img src="./public/assets/icon-client.svg">
													</div>
													<span class="alt-collapsed">S'identifier</span>
												</a>
											</li>
										</ul>
									</div>
				<?php
			}
		?>
		</div>
	</nav>
</header>