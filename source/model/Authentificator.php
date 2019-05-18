<?php
	namespace BeltranPhotoStock\Model;
	
	use \BeltranPhotoStock\Exception\NotFoundDBException;
	require_once('exceptions/NotFoundDBException.php');
	use \BeltranPhotoStock\Exception\DuplicationDBException;
	require_once('exceptions/DuplicationDBException.php');
	use \BeltranPhotoStock\Exception\DisabledAccountException;
	require_once('exceptions/DisabledAccountException.php');
	
	use \BeltranPhotoStock\Model\DBConnector;
	require_once('model/DBConnector.php');
	
	class Authentificator {
		
		/**
		 * Check if client email match with password input
		 * Then return the client ID or 0 if password is incorrect
		 * @param  string $email    Email input
		 * @param  string $password Password input
		 * @return int              Client ID when email and password match, 0 otherwise
		 * @throws DuplicationDBException when more than one email match with the input
		 * @throws NotFoundDBException when no match in database for the email input
		 * @throws DisabledAccountException when the account linked to the email is disabled
		 */
		static public function loginClient($email, $password) {
			return Authentificator::login('client', $email, $password);
		}
		
		/**
		 * Check if photographer email match with password input
		 * Then return the photographer ID or 0 if password is incorrect
		 * @param  string $email    Email input
		 * @param  string $password Password input
		 * @return int              Photographer ID when email and password match, 0 otherwise
		 * @throws DuplicationDBException when more than one email match with the input
		 * @throws NotFoundDBException when no match in database for the email input
		 * @throws DisabledAccountException when the account linked to the email is disabled
		 */
		static public function loginPhotographer($email, $password) {
			return Authentificator::login('photographe', $email, $password);
		}
		
		/**
		 * Check if administrator email match with password input
		 * Then return the administrator ID or 0 if password is incorrect
		 * @param  string $email    Email input
		 * @param  string $password Password input
		 * @return int              Admin ID when email and password match, 0 otherwise
		 * @throws DuplicationDBException when more than one email match with the input
		 * @throws NotFoundDBException when no match in database for the email input
		 * @throws DisabledAccountException when the account linked to the email is disabled
		 */
		static public function loginAdmin($email, $password) {
			return Authentificator::login('administrateur', $email, $password);
		}
		
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
			$db = DBConnector::dbConnectAsAdmin();
			$userStatement = $db->prepare('SELECT * FROM '.$tableName.' WHERE email = ? ;');
			$userStatement->execute(array($email));
			$user = $userStatement->fetchAll();
			
			if(count($user) > 1) {
				throw new DuplicationDBException('Email duplication in database', 1);
			}
			if(count($user) == 0) {
				throw new NotFoundDBException('Account not found in database', 1);
			}
			if($user[0]['disponible'] == 0) {
				throw new DisabledAccountException('Account disabled', 1);
			}
			if(password_verify($password, $user[0]['hashIdentifiants'])) {
				return ($user[0][0]);
			} else {
				return false;
			}
		}
	}
