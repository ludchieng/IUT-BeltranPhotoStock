<?php

?>


<?php //###################################################### ?>


<?php $htmlTitle = "Résultats — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php	require('./_search.php'); ?>

<main id="results">
	<aside>
		<fieldset class="chkfields white">
			<h1>Trier par...</h1>
			<label>
				<input type="radio" name="sort" value="oldest">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				du plus ancien au plus récent
			</label>
			<label>
				<input type="radio" name="sort" value="newest">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				du plus récent au plus ancien
			</label>
			<label>
				<input type="radio" name="sort" value="relevant">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				pertinence
			</label>
			<label>
				<input type="radio" name="sort" value="cheapest">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				du moins cher au plus cher
			</label>
			<label>
				<input type="radio" name="sort" value="costliest">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				du plus cher au moins cher
			</label>
		</fieldset>
		<fieldset class="chkfields white wrap">
			<h1>Filtrer par...</h1>
			<h2>Thème(s)</h2>
			<div class="flex-wrap flexV" style="max-height: 16em; align-items: flex-start;">
				<label>
					<input type="checkbox" name="theme" value="science">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Science
				</label>
				<label>
					<input type="checkbox" name="theme" value="technologie">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Technologie
				</label>
				<label>
					<input type="checkbox" name="theme" value="architecture">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Architecture
				</label>
				<label>
					<input type="checkbox" name="theme" value="abstrait">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Abstrait
				</label>
				<label>
					<input type="checkbox" name="theme" value="sport">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Sport
				</label>
				<label>
					<input type="checkbox" name="theme" value="culture">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Culture
				</label>
				<label>
					<input type="checkbox" name="theme" value="nature">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Nature
				</label>
				<label>
					<input type="checkbox" name="theme" value="musique">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Musique
				</label>
				<label>
					<input type="checkbox" name="theme" value="urbain">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Urbain
				</label>
				<label>
					<input type="checkbox" name="theme" value="paysage">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Paysage
				</label>
				<label>
					<input type="checkbox" name="theme" value="industrie">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Industrie
				</label>
				<label>
					<input type="checkbox" name="theme" value="Lifestyle">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Lifestyle
				</label>
				<label>
					<input type="checkbox" name="theme" value="nourriture">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Nourriture
				</label>
				<label>
					<input type="checkbox" name="theme" value="art">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Art
				</label>
				<label>
					<input type="checkbox" name="theme" value="voyage">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Voyage
				</label>
				<label>
					<input type="checkbox" name="theme" value="animaux">
					<span class="cell-chk"><span class="fill-chk"></span></span>
					Animaux
				</label>
			</div>
		</fieldset>

		<fieldset class="chkfields white wrap">
			<h2>Orientation(s)</h2>
			<label>
				<input type="checkbox" name="orientation" value="horizontal">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Horizontal
			</label>
			<label>
				<input type="checkbox" name="orientation" value="vertical">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Vertical
			</label>
			<label>
				<input type="checkbox" name="orientation" value="panoramique">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Panoramique
			</label>
			<label>
				<input type="checkbox" name="orientation" value="carre">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Carré
			</label>
		</fieldset>

		<fieldset>
			<h2>Prix</h2>
			<label style="margin-right: 16px;">
				<input class="txtf-shrt" type="text" name="price-min"><br/>
				Min.
			</label>
			<label>
				<input class="txtf-shrt" type="text" name="price-max"><br/>
				Max.
			</label>
		</fieldset>

		<fieldset class="chkfields white wrap">
			<h2>Taille (largeur)</h2>
			<label>
				<input type="radio" name="size" value="xlarge">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				Très grande (> 2200 px)
			</label>
			<label>
				<input type="radio" name="size" value="large">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				Grande (> 1200 px)
			</label>
			<label>
				<input type="radio" name="size" value="medium">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				Moyenne (> 700 px)
			</label>
			<label>
				<input type="radio" name="size" value="small">
				<span class="cell-radio"><span class="fill-radio"></span></span>
				Petite (< 700 px)
			</label>
		</fieldset>
	</aside>
	<div id="results-panel">
		<div id="results-imgs">
			<div class="results-column">
				<a href="">
					<img src="./public/images/pexels-photo-210243.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-210227.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-556664.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-596170.jpg">
				</a>
			</div>
			<div class="results-column">
				<a href="">
					<img src="./public/images/pexels-photo-572226.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-878251.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-965153.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-1087720.jpg">
				</a>
			</div>
			<div class="results-column">
				<a href="">
					<img src="./public/images/pexels-photo-1089199.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-1443867.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-1606407.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-325752.jpg">
				</a>
			</div>
			<div class="results-column">
				<a href="">
					<img src="./public/images/pexels-photo-1606407.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-572226.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-596170.jpg">
				</a>
				<a href="">
					<img src="./public/images/pexels-photo-556664.jpg">
				</a>
			</div>
		</div>
	</div>
</main>

<script src="public/js/results-panel-img-wrap.js"></script>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
