<?php
	namespace BeltranPhotoStock\Model;
	
	class CartItem {
		
		private $id_support;
		private $num;
		private $id_image;
		private $qte;
		
		
		function __construct($id_image) {
			$this->setIdImage($id_image);
		}
		
		
		public function setIdImage($idImage) {
			$this->id_image = $idImage;
		}
		public function getIdImage() {
			return $this->id_image;
		}
		
		public function setIdSupport($idSupport) {
			$this->id_support = $idSupport;
		}
		public function getIdSupport() {
			return $this->id_support;
		}
		
		public function setQte($qte) {
			$this->qte = $qte;
		}
		public function getQte() {
			return $this->qte;
		}
	}