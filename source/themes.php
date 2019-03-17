<?php $htmlTitle = "Thèmes — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php
  $searchTitle = "Thèmes";
  require('./_search.php');
?>

<main>
	<div class="container main-content">
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<a href="#t1">
					<img src="./public/assets/img-themes-sport.jpg">
					<div class="img-caption">Sport</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t2">
					<img src="./public/assets/img-themes-voyage.jpg">
					<div class="img-caption">Voyage</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t3">
					<img src="./public/assets/img-themes-urbain.jpg">
					<div class="img-caption">Urbain</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t4">
					<img src="./public/assets/img-themes-paysage.jpg">
					<div class="img-caption">Paysage</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<a href="#t5">
					<img src="./public/assets/img-themes-nourriture.jpg">
					<div class="img-caption">Nourriture</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t6">
					<img src="./public/assets/img-themes-lifestyle.jpg">
					<div class="img-caption">Lifestyle</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t7">
					<img src="./public/assets/img-themes-industrie.jpg">
					<div class="img-caption">Industrie</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#t8">
					<img src="./public/assets/img-themes-musique.jpg">
					<div class="img-caption">Musique</div>
				</a>
			</div>
		</div>
	</div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
