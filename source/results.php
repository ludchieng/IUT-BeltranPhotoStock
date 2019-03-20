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
				<input type="radio" name="sort" value="relevance">
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
				<input type="checkbox" name="sort" value="horizontal">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Horizontal
			</label>
			<label>
				<input type="checkbox" name="sort" value="vertical">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Vertical
			</label>
			<label>
				<input type="checkbox" name="sort" value="panoramique">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Panoramique
			</label>
			<label>
				<input type="checkbox" name="sort" value="carre">
				<span class="cell-chk"><span class="fill-chk"></span></span>
				Carré
			</label>
		</fieldset>

	</aside>
	<div class="results-panel">
		There’s no more faith in thee than a stewed prune. Thou art a boil, a plague sore, an embossed carbunkle in my corrupted blood. Away you three inch fool! Thou art a natural coward without instinct. You, minion, are too saucy. Thou art the best of cutthroats. A weasel has not such a spleen as you are toss’d with. Your virginity breeds mites, much like a cheese. Thou leathern-jerkin, crystal button, knot-pated, agatering, puke-stocking, caddis-garter, smooth tongue, Spanish pouch. Thou art the son and heir of a mongrel bitch.
	</div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
