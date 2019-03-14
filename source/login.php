<?php $htmlTitle = "BeltranPhotoStock — Se connecter"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>

<main>
  <div class="block">
    <div class="block-title">
      Connexion
    </div>
    <div class="block-content">
      <form action="#" method="post">

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" name="email" type="text">
        </div>

        <div class="form-group">
          <label>Mot de passe</label>
          <input class="form-control" name="password" type="password">
        </div>

        <div class="form-group flexH flex-align-justify">
          <a class="form-signup" href="./signup.php">Pas encore inscrit ?</a>
          <input class="btn btn-default btn-blue-dark" type="submit" value="Se connecter">
        </div>
      </form>
    </div>
  </div>
</main>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
