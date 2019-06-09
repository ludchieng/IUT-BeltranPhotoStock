<?php
	namespace BeltranPhotoStock\Model;
	
	class DBConnector {
		
		/**
		 * Instanciate database connection as Root user
		 */
		static public function dbConnectAsRoot() {
			return DBConnector::dbConnect('root','');
		}
		
		/**
		 * Instanciate database connection as Admin
		 */
		static public function dbConnectAsAdmin() {
			return DBConnector::dbConnect('admin','bps_milos26');
		}
		
		/**
		 * Instanciate database connection
		 * @param  string $user     Database username
		 * @param  string $password Database password
		 * @return PDO              Database connection object
		 */
		static public function dbConnect($user, $password) {
			return new \PDO('mysql:host=localhost;dbname=beltran_photo_stock;charset=utf8', $user, $password);
		}
	}
