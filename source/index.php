<?php
	// Import dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use BeltranPhotoStock\Model\Visitor;
	require_once('./model/Visitor.php');
	use BeltranPhotoStock\Model\Admin;
	require_once('./model/Admin.php');
	use BeltranPhotoStock\Model\Client;
	require_once('./model/Client.php');
	use BeltranPhotoStock\Model\Photographer;
	require_once('./model/Photographer.php');
	
	$user = SessionManager::getUser();
	$userType = SessionManager::getUserType();

?>



<?php //###################################################### ?>

<?php $htmlTitle = "Index — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php require('./_search.php'); ?>

<main>
	<div class="container main-content">
		<h1><a href="#">Thèmes</a></h1>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=5">
					<img src="./public/assets/img-themes-sport.jpg">
					<div class="img-caption">Sport</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=15">
					<img src="./public/assets/img-themes-voyage.jpg">
					<div class="img-caption">Voyage</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=9">
					<img src="./public/assets/img-themes-urbain.jpg">
					<div class="img-caption">Urbain</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=10">
					<img src="./public/assets/img-themes-paysage.jpg">
					<div class="img-caption">Paysage</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=13">
					<img src="./public/assets/img-themes-nourriture.jpg">
					<div class="img-caption">Nourriture</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=12">
					<img src="./public/assets/img-themes-lifestyle.jpg">
					<div class="img-caption">Lifestyle</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=11">
					<img src="./public/assets/img-themes-industrie.jpg">
					<div class="img-caption">Industrie</div>
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="./results.php?id_theme=8">
					<img src="./public/assets/img-themes-musique.jpg">
					<div class="img-caption">Musique</div>
				</a>
			</div>
		</div>


		<h1><a href="#">Derniers Événements</a></h1>
    <div class="row thn">
      <div class="col-sm-4">
        <a href="#e1"><img class="thn-img" src="./public/assets/img-event-1-thn.jpg"></a>
      </div>
      <div class="col-sm-8">
        <div class="thn-title"><a href="#e1">Linkin Park — London Live 2017</a></div>
        <div class="thn-date">12 avr. 2017</div>
        <div class="thn-desc">Come, come, you talk greasily; your lips grow foul. Hast thou never an eye in thy head? Thou clouted crook-pated hugger-mugger! Thou dissembling idle-headed pigeon-egg! Thou mangled fen-sucked bum-bailey! Thou leathern-jerkin, crystal-button, knot-pated, agatering, puke-stocking, caddis-garter, smooth-tongue, Spanish pouch! Thou rank hedge-born boar-pig! Thou wimpled clapper-clawed flax-wench! Thou qualling unwash'd devil-mon!</div>
      </div>
    </div>
    <div class="row thn">
      <div class="col-sm-4">
        <a href="#e1"><img class="thn-img" src="./public/assets/img-event-2-thn.jpg"></a>
      </div>
      <div class="col-sm-8">
        <div class="thn-title"><a href="#e1">Marathon de Paris</a></div>
        <div class="thn-date">8 mars 2018</div>
        <div class="thn-desc">There’s no more faith in thee than a stewed prune. Thou art a boil, a plague sore, an embossed carbunkle in my corrupted blood. Away you three inch fool! Thou art a natural coward without instinct. You, minion, are too saucy. Thou art the best of cutthroats. A weasel has not such a spleen as you are toss’d with. Your virginity breeds mites, much like a cheese. Thou leathern-jerkin, crystal button, knot-pated, agatering, puke-stocking, caddis-garter, smooth tongue, Spanish pouch. Thou art the son and heir of a mongrel bitch.</div>
      </div>
    </div>
    <div class="row thn">
      <div class="col-sm-4">
        <a href="#e1"><img class="thn-img" src="./public/assets/img-event-3-thn.jpg"></a>
      </div>
      <div class="col-sm-8">
        <div class="thn-title"><a href="#e1">Le Salon de la Botanique — Bordeaux</a></div>
        <div class="thn-date">5 févr. 2018</div>
        <div class="thn-desc">Thou clay-brained guts, thou knotty-pated fool, thou whoreson obscene greasy tallow-catch! That trunk of humours, that bolting-hutch of beastliness, that swollen parcel of dropsies, that huge bombard of sack, that stuffed cloak-bag of guts, that roasted Manningtree ox with pudding in his belly, that reverend vice, that grey Iniquity, that father ruffian, that vanity in years? You starvelling, you eel-skin, you dried neat’s-tongue, you bull’s-pizzle, you stock-fish–O for breath to utter what is like thee!-you tailor’s-yard, you sheath, you bow-case, you vile standing tuck!</div>
      </div>
    </div>
    <div class="row thn">
      <div class="col-sm-4">
        <a href="#e1"><img class="thn-img" src="./public/assets/img-event-4-thn.jpg"></a>
      </div>
      <div class="col-sm-8">
        <div class="thn-title"><a href="#e1">Féria de San Fermin — Pampelune</a></div>
        <div class="thn-date">20 janv. 2018</div>
        <div class="thn-desc">Thou art some fool, I am loath to beat thee. Thou reeky rampallian dewberry! Methink'st thou art a general offence and every man should beat thee. Were I like thee I'd throw away myself. Thou slander of thy heavy mother's womb! Thou fusty rude-growing flirt-gill! Thou misbegotten bat-fowling maggot-pie! Thine sole name blisters our tongues. Thou churlish shard-borne harpy!</div>
      </div>
    </div>
	</div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
