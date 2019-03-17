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
    <div class="row">
      <div class="col-sm-4">
        Yolo1
      </div>
      <div class="col-sm-8">
        Yolo2
      </div>
    </div>
  </div>
</main>

<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
