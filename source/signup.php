<?php
  session_start();

  //Include dependencies
  use \BeltranPhotoStock\Model\DAO;
  require_once('model/DAO.php');
  use \BeltranPhotoStock\Model\Client;
  require_once('model/Client.php');
  use \BeltranPhotoStock\Exception\NotFoundDBException;
  require_once('exceptions/NotFoundDBException.php');

  //Initialize view variables
  $form['civilite-0-chk-state'] = '';
  $form['civilite-1-chk-state'] = '';
  $form['civilite-2-chk-state'] = '';
  $form['civilite'] = '';
  if(isset($_POST['civilite'])) {
    switch($_POST['civilite']) {
      case '0':
      $form['civilite-0-chk-state'] = 'checked';
      $form['civilite'] = 0;
      break;
      case '1':
      $form['civilite-1-chk-state'] = 'checked';
      $form['civilite'] = 1;
      break;
      case '2':
      $form['civilite-2-chk-state'] = 'checked';
      $form['civilite'] = 2;
      break;
    }
  }

  function getPost($inputName) {
    if(isset($_POST[$inputName])) {
      return $_POST[$inputName];
    } else {
      return '';
    }
  }
  $form['prenom'] = getPost('prenom');
  $form['nom'] = getPost('nom');
  $form['jour'] = getPost('jour');
  $form['mois'] = getPost('mois');
  $form['annee'] = getPost('annee');
  $form['telephone-ind'] = getPost('telephone-ind');
  $form['telephone'] = getPost('telephone');
  $form['adresse'] = getPost('adresse');
  $form['cp'] = getPost('cp');
  $form['ville'] = getPost('ville');
  $form['pays'] = getPost('pays');
  $form['email'] = getPost('email');

  $view['form-header'] = '';
  $view['mdp'] = '';

  //Check form inputs

  $form['mdp'] = getPost('mdp');
  $form['mdp-confirm'] = getPost('mdp-confirm');


  if(isset($_POST['submit']) && $form['mdp'] == $form['mdp-confirm']) {
    //Then both password inputs match

    if($form['civilite'] != '' &&
      $form['prenom'] != '' &&
      $form['nom'] != '' &&
      $form['jour'] != '' &&
      $form['mois'] != '' &&
      $form['annee'] != '' &&
      $form['telephone-ind'] != '' &&
      $form['telephone'] != '' &&
      $form['adresse'] != '' &&
      $form['cp'] != '' &&
      $form['ville'] != '' &&
      $form['pays'] != '' &&
      $form['email'] != '' &&
      $form['mdp'] != '' &&
      $form['mdp-confirm'] != ''
    ) {
      //Then all the text fields are filled
      $dao = new DAO();
      $clientData = array(
        'id_client' => null,
        'civilite' => $form['civilite'],
        'nom' => $form['nom'],
        'prenom' => $form['prenom'],
        'dateNaissance' => $form['annee'].'-'.$form['mois'].'-'.$form['jour'],
        'adresse' => $form['adresse'],
        'cp' => $form['cp'],
        'ville' => $form['ville'],
        'pays' => $form['pays'],
        'telephone' => '+'.$form['telephone-ind'].$form['telephone'],
        'email' => $form['email'],
        'hashIdentifiants' => $form['mdp'],
        'disponible' => 1
      );
      $client = new Client($clientData);
      $idClient = $dao->addClient($client);

      //Check in database if successful
      try {
        $dao->getClientById($idClient);
        $success = true;
        $view['form-header'] = '<div class="txt-green">Inscription réussie.</div>';
      } catch(NotFoundDBException $e) {
        $success = false;
        $view['form-header'] = '<div class="txt-orange">Erreur base de données.</div>';
      }
      if($success) {
        header('Location: ./signup-confirmation.php');
      }
    } else {
      $view['form-header'] = '<div class="txt-red">Veuillez compléter tous les champs requis.</div>';
    }
  } else {
    $view['form-header'] = '<div class="txt-red">Les deux mots de passe ne correspondent pas.</div>';
  }
?>


<?php //###################################################### ?>


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

      <?= $view['form-header'] ?>

      <form class="explicit-form" action="#" method="post">
        <div class="form-group">
          <label>Civilité*</label><br/>
          <label class="form-civilite"><input name="civilite" type="radio" value="0" <?= $form['civilite-0-chk-state'] ?>> M.</label>
          <label class="form-civilite"><input name="civilite" type="radio" value="1" <?= $form['civilite-1-chk-state'] ?>> Mme</label>
          <label class="form-civilite"><input name="civilite" type="radio" value="2" <?= $form['civilite-2-chk-state'] ?>> Autre</label>
        </div>

        <div class="form-group">
          <label>Prénom*</label>
          <input class="form-control" name="prenom" type="text" value="<?= $form['prenom'] ?>" pattern="[A-Za-z]{1,}">
        </div>

        <div class="form-group">
          <label>Nom*</label>
          <input class="form-control" name="nom" type="text" value="<?= $form['nom'] ?>" pattern="[A-Za-z]{1,}">
        </div>

        <div class="form-group">
          <label>Date de naissance</label>
          <fieldset class="form-date">
            <input class="form-control" name="jour" type="text" placeholder="jj" value="<?= $form['jour'] ?>" pattern="[0-9]{0,2}">
            <input class="form-control" name="mois" type="text" placeholder="mm" value="<?= $form['mois'] ?>" pattern="[0-9]{0,2}">
            <input class="form-control" name="annee" type="text" placeholder="aaaa" value="<?= $form['annee'] ?>" pattern="[0-9]{0,4}">
          </fieldset>
        </div>

        <div class="form-group">
          <label>Téléphone</label>
          <fieldset class="form-phone flexH">
            <div class="input-group form-phone-ind">
              <span class="input-group-addon">+</span>
              <input class="form-control" name="telephone-ind" type="text" value="<?= $form['telephone-ind'] ?>" maxlength="2">
            </div>
            <input class="form-control form-phone-num" name="telephone" type="text" value="<?= $form['telephone'] ?>">
          </fieldset class="form-phone">
        </div>

        <div class="form-group">
          <label>Adresse</label>
          <input class="form-control" name="adresse" type="text" value="<?= $form['adresse'] ?>">
        </div>

        <div class="form-group flexH">
          <div class="form-group form-cp">
            <label>Code Postal</label>
            <input class="form-control" name="cp" type="text" value="<?= $form['cp'] ?>">
          </div>
          <div class="form-group form-ville">
            <label>Ville</label>
            <input class="form-control" name="ville" type="text" value="<?= $form['ville'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label>Pays</label>
          <input class="form-control" name="pays" type="text" value="<?= $form['pays'] ?>">
        </div>

        <div class="form-group">
          <label>E-mail*</label>
          <input class="form-control" name="email" type="text" value="<?= $form['email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>

        <div class="form-group">
          <label>Mot de passe*</label>
          <input class="form-control" name="mdp" type="password" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" title="Doit avoir une longueur d'au moins 6 caractères et contenir au moins un chiffre et une lettre">
        </div>

        <div class="form-group">
          <label>Confirmer mot de passe*</label>
          <input class="form-control" name="mdp-confirm" type="password">
        </div>

        <?= $view['mdp'] ?>

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
