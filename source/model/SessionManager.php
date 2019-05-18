<?php
	namespace BeltranPhotoStock\Model;
	
	use \BeltranPhotoStock\Model\Visitor;
	require_once('model/Visitor.php');
	use \BeltranPhotoStock\Model\Client;
	require_once('model/Client.php');
	use \BeltranPhotoStock\Model\Photographer;
	require_once('model/Photographer.php');
	use \BeltranPhotoStock\Model\Admin;
	require_once('model/Admin.php');
	
	class SessionManager {
		static public function start() {
			if(session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
		
		static public function set($name, $var) {
			SessionManager::start();
			$_SESSION[$name] = serialize($var);
		}
		
		static public function get($name) {
			SessionManager::start();
			return unserialize($_SESSION[$name]);
		}
		
		static public function getUser() {
			SessionManager::start();
			if(!isset($_SESSION['user'])) {
				$_SESSION['user'] = serialize(new Visitor(array()));
			}
			return unserialize($_SESSION['user']);
		}
		
		static public function getAuthenticatedUser() {
			SessionManager::start();
			$user = unserialize($_SESSION['user']);
			if($user instanceof Client || $user instanceof Photographer || $user instanceof Admin) {
				return $user;
			} else {
				return null;
			}
		}
		
		static public function getUserType() {
			SessionManager::start();
			$user = SessionManager::getUser();
			if($user instanceof Client) {
				return 'client';
			} elseif($user instanceof Photographer) {
				return 'photographer';
			} elseif($user instanceof Admin) {
				return 'admin';
			} elseif($user instanceof Visitor) {
				return 'visitor';
			} else {
				return null;
			}
		}
	}
