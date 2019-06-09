<?php
	/*
	 * Traitement préalable ici
	 */
?>

<?php $htmlTitle = "Ma Page — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = "./public/styles/_ma-page.css"; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php require('./_search.php'); ?>

<main>
	<div class="container main-content" style="height: 20em;">
		<!-- code html ici -->
	</div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>


<?php
	// POUR DOCUMENT PROG SEULEMENT
	/**
	 * Check if user email match with password input
	 * Then return the user ID or 0 if password is incorrect
	 * @param  string $tableName Database table name
	 * @param  string $email     Email input
	 * @param  string $password  Password input
	 * @return int               User ID when email and password match, 0 otherwise
	 * @throws DuplicationDBException when more than one email match with the input
	 * @throws NotFoundDBException when no match in database for the email input
	 * @throws DisabledAccountException when the account linked to the email is disabled
	 */
	static private function login($tableName, $email, $password) {
		// Connect to database
		$db = DBConnector::dbConnectAsVisitor();
		// Retrieve user data which match with the email input
		$userStatement = $db->prepare('SELECT * FROM '.$tableName.' WHERE email = ? ;');
		$userStatement->execute(array($email));
		$user = $userStatement->fetchAll();
		
		if(count($user) > 1) {
			// Multiple users correspond to the email
			throw new DuplicationDBException('Email duplication in database', 1);
		}
		if(count($user) == 0) {
			// No user found with this email
			throw new NotFoundDBException('Account not found in database', 1);
		}
		if($user[0]['disponible'] == 0) {
			// The account with this email is disabled
			throw new DisabledAccountException('Account disabled', 1);
		}
		if(password_verify($password, $user[0]['hashIdentifiants'])) {
			// Password entered is correct
			return ($user[0][0]);
		} else {
			return false;
		}
	}