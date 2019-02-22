<?php
	session_start();
?>

<?php
function throwError($text) {
    echo '<span class=\'debug\'>Exception: '.$text.'.</span>';
    die();
}

function preFillInputField($fieldName) {
    if(isset($_POST[$fieldName])) {
      echo '"'.$_POST[$fieldName].'"';
    } else {
      echo '""';
    }
}

?>


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



<!DOCTYPE html>
<html lang="fr">
<head>
	<title>CrashTest Page</title>
	<link rel="stylesheet" type="text/css" href="styles/default.css" />
	<link rel="stylesheet" type="text/css" href="styles/content.css" />
</head>
<body>
	<?php //Connect to database
		$dbUser = "visiteur";
		$dbPassword = "lalala";
		include('php/frag_db-connect.php');
	?>
	<?php //Try to authenticate
		if(isset($_POST['password']) && isset($_POST['email'])) {
			$dbQuery = $db->query("SELECT * FROM client WHERE email = \"".$_POST['email']."\"")->fetchAll();
			//CLIENT id_client civilite nom prenom dateNaissance adresse cp ville pays telephone email hashIdentifiants disponible
		  if (count($dbQuery) > 1) {
		    throwError("Email duplication in database");
		    die();
			} else if(count($dbQuery) == 1) {
				$client = new Client($dbQuery['0']);
				if($client->canConnect($_POST['password'])) {
					$_SESSION['user'] = $client->getInfo();
					$client = null;
					header("Location: ./client.php");
				}
			}
		}
	?>
	<main>
		<h1>Authentification</h1>
    <form id="authentification" action="login.php" method="post">
			<?php
				if(isset($_POST['email']) && !isset($client)) {
					echo "Email non enregistré.<br/>";
				} else if(isset($client) && !$client->isDisponible()) {
					echo "Compte désactivé.<br/>";
				} else if(isset($_POST['password']) && isset($_POST['email']) && isset($client) && !$client->canConnect($_POST['password'])) {
					echo "Mauvais mot de passe.<br/>";
				}
			?>
      <input type="text" name="email" placeholder="E-mail" value=<?php preFillInputField('email');?>/><br/>
      <input type="password" name="password" placeholder="Mot de passe"/><br/>
      <input id="connect" type="submit" value="Valider"/>
      <p class="message">Pas enregistré ? <a href="#">S'inscrire</a></p>
    </form>
	</main>
</body>
</html>
