<?php
	session_start();
	// Import dependencies
	use \BeltranPhotoStock\Model\DAO;
	require_once('model/DAO.php');
	
	// Initialize view variables
	function getPost($inputName) {
		if(isset($_POST[$inputName])) {
			return $_POST[$inputName];
		} else {
			return '';
		}
	}
	$form['search'] = getPost('search');
	$form['price-min'] = preg_replace("/[^0-9]/", "", getPost('price-min'));
	$form['price-max'] = preg_replace("/[^0-9]/", "", getPost('price-max'));
	
	// Retrieve idTheme from GET variable
	if(isset($_GET['id_theme'])) {
		$themes = array($_GET['id_theme']);
		$search = "";
	}
	// Retrieve search from POST variable
	if(isset($_POST['search'])) {
	  // Escape special chars
	  $forbiddenChar = [';', '(', ')', '"', ',', '<', '>'];
	  $search = str_replace($forbiddenChar, "", $_POST['search']);
	}
	
	// Load images
	if(isset($_POST['search']) || isset($_GET['id_theme'])) {
		// Explode the query search to an array of words
		$search = explode(" ",$search);
		
		// SQL Query generation
		$sql = 'SELECT DISTINCT I.id_image, I.filename, I.titre, I.dateCreation, I.datePriseDeVue,
				I.PrixHT, I.camera, I.longueurFocale, I.ouverture, I.tpsExpo, I.sensibiliteISO,
  				I.clefAcces, I.visibilite, I.id_collection, I.id_photographe, I.id_theme, I.auteur
				FROM image I, tag T, posseder IT WHERE I.id_image=IT.id_image AND IT.id_tag=T.id_tag ';
		
		// tags filter
		$sql .= " AND (T.label LIKE '%".$search['0']."%'";
		$sql .= " OR I.titre LIKE '%".array_shift($search)."%'";
		foreach ($search as $word) {
			$sql .= " OR T.label LIKE '%".$word."%'";
			$sql .= " OR I.titre LIKE '%".$word."%'";
		}
		$sql .= ")";
		
		// themes filter
		$NB_THEMES = 16;
		if(!isset($themes)) {
			$themes = array();
			for($i = 1; $i <= $NB_THEMES; $i++) {
				if(isset($_POST['theme-'.$i]) && $_POST['theme-'.$i] == 'true') {
					array_push($themes, $i);
				}
			}
		}
		if(count($themes) > 0) {
			$sql .= ' AND (';
			$sql .= 'I.id_theme = '.array_shift($themes);
			while(count($themes) > 0) {
		  	$sql .= ' OR I.id_theme = '.array_shift($themes);
	  	}
			$sql .= ')';
		}
		
		// price filter
	  if(isset($_POST['price-min'])) {
		  $priceMin = preg_replace("/[^0-9]/", "", $_POST['price-min']);
	  } else {
			$priceMin = '';
		}
	  if(isset($_POST['price-min'])) {
			$priceMax = preg_replace("/[^0-9]/", "", $_POST['price-max']);
	  } else {
	  	$priceMax = '';
		}
	  if($priceMin == '') {
		  $priceMin = 0;
	  }
	  if($priceMax == '') {
			$priceMax = 9999999;
	  }
	  $sql .= " AND (prixHT >= $priceMin AND prixHT <= $priceMax)";
	  
	  // order by
		if(isset($_POST['sort'])) {
			$sql .= ' ORDER BY ';
			switch($_POST['sort']) {
				case 'oldest':
					$sql .= 'I.datePriseDeVue';
					break;
				case 'newest':
					$sql .= 'I.datePriseDeVue DESC';
					break;
				case 'cheapest':
					$sql .= 'I.prixHT';
					break;
				case 'costliest':
					$sql .= 'I.prixHT DESC';
			}
		}
		
	  $sql .= ';';
		
		// database call
		$dao = new DAO();
		$imgs = $dao->getImages($sql);
	} else {
		$imgs = array();
	}
	
	function echoImg($filename, $id) {
		echo '<a href="./image.php?id_image='. $id .'">';
	  echo '<img src="./public/images/'.$filename.'">';
	  echo '</a>';
	}
?>


<?php //###################################################### ?>


<?php $htmlTitle = "Résultats — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>
<form action="./results.php" method="post">
	<section id="search" class="bg-img-images">
		<div id="search-content" class="container-fluid">
			<div id="search-title">Explorer</div>
			<div id="search-bar" class="flexH">
				<button name="submit" type="submit"><img src="./public/assets/icon-search.svg"></button>
				<input class="form-control" name="search" type="text" placeholder="Rechercher..." value="<?= $form['search'] ?>">
			</div>
		</div>
		<script src="public/js/search-sticky-onscroll.js"></script>
	</section>
	
	<main id="results">
	  <?php require('./_aside-results.php') ?>
		<div id="results-panel">
			<div id="results-imgs">
				<div class="results-column">
			<?php
				for($i = 0; $i < count($imgs); $i+=4) {
					echoImg($imgs[$i]['filename'], $imgs[$i]['id_image']);
				}
			?>
				</div>
				<div class="results-column">
			<?php
				for($i = 1; $i < count($imgs); $i+=4) {
					echoImg($imgs[$i]['filename'], $imgs[$i]['id_image']);
				}
			?>
				</div>
				<div class="results-column">
			<?php
				for($i = 2; $i < count($imgs); $i+=4) {
					echoImg($imgs[$i]['filename'], $imgs[$i]['id_image']);
				}
			?>
				</div>
				<div class="results-column">
			<?php
				for($i = 3; $i < count($imgs); $i+=4) {
					echoImg($imgs[$i]['filename'], $imgs[$i]['id_image']);
				}
			?>
				</div>
			</div>
		</div>
	</main>

</form>

<script src="public/js/results-panel-img-wrap.js"></script>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
