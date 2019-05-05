<?php $htmlTitle = "Inscription — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<main>
  <div class="block">
    <div class="block-title">
      Inscription
    </div>
    <div class="block-content">
      <div class="txt-green">Inscription réussie.</div>
    </div>
  </div>
</main>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
