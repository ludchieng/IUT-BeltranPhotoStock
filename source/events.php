<?php $htmlTitle = "Thèmes — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<?php require('./_searchEvent.php'); ?>

<main>
  <div class="container main-content">
    <h1><a href="#">Derniers Événements</a></h1>
    <div class="row thn">
      <div class="col-sm-4">
        <a href="#e1"><img class="thn-img" src="./public/assets/img-event-1-thn.jpg"></a>
      </div>
      <div class="col-sm-8">
        <div class="thn-title"><a href="#e1">Linkin Park — London Live 2017</a></div>
        <div class="thn-date">21 mai 2017</div>
        <div class="thn-desc">Come, come, you talk greasily; your lips grow foul. Hast thou never an eye in thy head? Thou clouted crook-pated hugger-mugger! Thou dissembling idle-headed pigeon-egg! Thou mangled fen-sucked bum-bailey! Thou leathern-jerkin, crystal-button, knot-pated, agatering, puke-stocking, caddis-garter, smooth-tongue, Spanish pouch! Thou rank hedge-born boar-pig! Thou wimpled clapper-clawed flax-wench! Thou qualling unwash'd devil-mon!</div>
      </div>
    </div>
  </div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
