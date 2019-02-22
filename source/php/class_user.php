<?php
  abstract class User {
		private $infos;
    //CLIENT id_client civilite nom prenom dateNaissance adresse cp ville pays telephone email hashIdentifiants disponible

		function __construct($dbInfos) {
			$this->infos = $dbInfos;
		}

		function __destruct() {
			echo "<!-- Destroying User -->";
		}

		public function get($info) {
			if (!isset($this->infos[$info])) {
        $this->toString();
				throwError("Unable to get '".$info."' from Client");
				die();
			}
			return $this->infos[$info];
		}

		public function getInfo() {
			if (!isset($this->infos)) {
				throwError("Unable to get Client->infos");
				die();
			}
			return $this->infos;
		}

		public function isDisponible() {
			return ($this->get('disponible') <> '0');
		}

		public function canConnect($password) {
			return ($this->isDisponible() && $this->get('hashIdentifiants')==$password);
    }

    public function toString() {
      echo "Client: ";
      print_r($this->infos);
      echo "<br/>";
    }
  }

	class Client extends User {
	}

	class Photographe extends User {
	}

	class Administrateur extends User {
	}
?>
