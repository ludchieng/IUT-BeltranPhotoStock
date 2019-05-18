<?php
	//Include dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use \BeltranPhotoStock\Model\Authentificator;
	require_once('model/Authentificator.php');
	use \BeltranPhotoStock\Exception\DuplicationDBException;
	require_once('exceptions/DuplicationDBException.php');
	use \BeltranPhotoStock\Exception\NotFoundDBException;
	require_once('exceptions/NotFoundDBException.php');
	use \BeltranPhotoStock\Exception\DisabledAccountException;
	require_once('exceptions/DisabledAccountException.php');
	use \BeltranPhotoStock\Model\DAO;
	require_once('model/DAO.php');
	use \BeltranPhotoStock\Model\Admin;
	require_once('model/Admin.php');
	
	// Initialize view variables
	$view['message'] = '';
	
	$form['email-input'] = '';
	if (isset($_POST['email-input'])) {
		$form['email-input'] = $_POST['email-input'];
	}
	
	//Authenticate user
	if(isset($_POST['submit'])) {
		//Check password
		if($_POST['email-input'] != '' && $_POST['password-input'] != '') {
			try {
				//Verify Login name
				$idUser = Authentificator::loginAdmin($_POST['email-input'], $_POST['password-input']);
				//Process returned result
				if($idUser != false) {
					$view['message'] = '<div class="txt-green">Authentification réussie.</div>';
					SessionManager::set('user',DAO::getAdminById($idUser));
					header("Location: ./admin.php");
				} else {
					$view['message'] = '<div class="txt-red">Authentification échouée.</div>';
				}
			} catch (Exception $e) {
				if ($e instanceof NotFoundDBException) {
					$view['message'] = '<div class="txt-red">E-mail Inconnu.</div>';
				} else if ($e instanceof DisabledAccountException) {
					$view['message'] = '<div class="txt-red">Compte désactivé.</div>';
				} else {
					print_r($e);
					die();
				}
			}
		} else {
			$view['message'] = '<div class="txt-red">Veuillez compléter les deux champs.</div>';
		}
	}
?>


<?php //###################################################### ?>


<?php $htmlTitle = "Administration — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<main>
	<div class="block">
		<div class="block-title">Administration</div>
		<div class="block-content">
			<form action="login-admin.php" method="post">
				
				<div class="form-group">
					<label>Email*</label>
					<input class="form-control" name="email-input" type="text" value="<?= $form['email-input'] ?>">
				</div>
				
				<div class="form-group">
					<label>Mot de passe*</label>
					<input class="form-control" name="password-input" type="password">
				</div>
		  
		  <?= $view['message'] ?>
				
				<div class="form-group flexH flex-align-justify">
					<input class="btn btn-default btn-blue-dark" name="submit" type="submit" value="S'authentifier">
				</div>
			</form>
		</div>
	</div>
</main>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
