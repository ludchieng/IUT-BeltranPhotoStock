<?php
	namespace BeltranPhotoStock\Model;
	
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
