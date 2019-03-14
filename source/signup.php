<?php $htmlTitle = "BeltranPhotoStock — Inscription"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>

<main>
  <div class="block">
    <div class="block-title">
      Inscription
    </div>
    <div class="block-content">
      <form class="explicit-form" action="#" method="post">
        <div class="form-group">
          <label>Civilité*</label><br/>
          <label class="form-civilite"><input name="civilite" type="radio" value="0"> M.</label>
          <label class="form-civilite"><input name="civilite" type="radio" value="1"> Mme</label>
          <label class="form-civilite"><input name="civilite" type="radio" value="2"> Autre</label>
        </div>

        <div class="form-group">
          <label>Prénom*</label>
          <input class="form-control" name="prenom" type="text" pattern="[A-Za-z]{1,}">
        </div>

        <div class="form-group">
          <label>Nom*</label>
          <input class="form-control" name="nom" type="text" pattern="[A-Za-z]{1,}">
        </div>

        <div class="form-group">
          <label>Date de naissance*</label>
          <fieldset class="form-date">
            <input class="form-control" name="jour" type="text" placeholder="jj" pattern="[0-9]{1,2}">
            <input class="form-control" name="mois" type="text" placeholder="mm" pattern="[0-9]{1,2}">
            <input class="form-control" name="annee" type="text" placeholder="aaaa" pattern="[0-9]{4}">
          </fieldset>
        </div>

        <div class="form-group">
          <label>Téléphone</label>
          <fieldset class="form-phone flexH">
            <div class="input-group form-phone-ind">
              <span class="input-group-addon">+</span>
              <input class="form-control" name="telephone" type="text" maxlength="2">
            </div>
            <input class="form-control form-phone-num" name="telephone" type="text">
          </fieldset class="form-phone">
        </div>

        <div class="form-group">
          <label>Adresse</label>
          <input class="form-control" name="adresse" type="text">
        </div>

        <div class="form-group flexH">
          <div class="form-group form-cp">
            <label>Code Postal</label>
            <input class="form-control" name="cp" type="text">
          </div>
          <div class="form-group form-ville">
            <label>Ville</label>
            <input class="form-control" name="ville" type="text">
          </div>
        </div>

        <div class="form-group">
          <label>Pays</label>
          <input class="form-control" name="pays" type="text">
        </div>

        <div class="form-group">
          <label>E-mail*</label>
          <input class="form-control" name="email" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>

        <div class="form-group">
          <label>Mot de passe*</label>
          <input class="form-control" name="mdp" type="password" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" title="Doit avoir une longueur d'au moins 6 caractères et contenir au moins un chiffre et une lettre">
        </div>

        <div class="form-group">
          <label>Confirmer mot de passe*</label>
          <input class="form-control" name="mdp" type="password">
        </div>

        <div class="form-group align-right">
          <input class="btn btn-default btn-blue-dark w-fullW " name="submit" type="submit" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
</main>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
