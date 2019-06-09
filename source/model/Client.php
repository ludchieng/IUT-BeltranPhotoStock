<?php
	namespace BeltranPhotoStock\Model;
	
	use \BeltranPhotoStock\Model\CartItem;
	require_once('model/CartItem.php');
	
	require_once('model/User.php');
	
	class Client extends User {
		function __construct($userData) {
			parent::__construct($userData);
		}
		
		public function addToCart($idImage) {
			$name = 'cart-'.$this->getData()['id_client'];
			$item = new CartItem($idImage);
			$cart = $this->getCart();
			array_push($cart, $item);
			setcookie($name, serialize($cart), time()+99999999);
			SessionManager::set('user', $this);
		}
		
		public function delFromCart($indexItem) {
			$name = 'cart-'.$this->getData()['id_client'];
			$cart = $this->getCart();
			
			// Delete item at specified index and shift the array
			unset($cart[$indexItem]);
			$cart = array_values($cart);
			
			setcookie($name, serialize($cart), time()+99999999);
			SessionManager::set('user', $this);
		}
		
		public function duplicateItemCart($indexItem) {
			$name = 'cart-'.$this->getData()['id_client'];
			$cart = $this->getCart();
			
			// Insert item at specified index
			$newItem = array($cart[$indexItem]);
			array_splice( $cart, $indexItem+1, 0, $newItem);
			
			setcookie($name, serialize($cart), time()+99999999);
			SessionManager::set('user', $this);
		}
		
		public function getCart() {
			$name = 'cart-'.$this->getData()['id_client'];
			if(isset($_COOKIE[$name])) {
				return unserialize($_COOKIE[$name]);
			} else {
				return array();
			}
		}
		
		public function resetCart() {
			$name = 'cart-'.$this->getData()['id_client'];
			setcookie($name, null, time()-1);
		}
	}
