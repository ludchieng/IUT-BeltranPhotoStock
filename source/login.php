<?php
  session_start();

  //Include dependencies
  use \BeltranPhotoStock\Model\Authentificator;
  require_once('model/Authentificator.php');
  use \BeltranPhotoStock\Exception\DuplicationDBException;
  require_once('exceptions/DuplicationDBException.php');
  use \BeltranPhotoStock\Exception\NotFoundDBException;
  require_once('exceptions/NotFoundDBException.php');
  use \BeltranPhotoStock\Exception\DisabledAccountException;
  require_once('exceptions/DisabledAccountException.php');
  use \BeltranPhotoStock\Model\DAO;
  require_once('model/DAO.php');
  use \BeltranPhotoStock\Model\Client;
  require_once('model/Client.php');
  use \BeltranPhotoStock\Model\Photographer;
  require_once('model/Photographer.php');

  //Initialize display variables
  $info['message'] = '';

  $form['email-input'] = '';
  if (isset($_POST['email-input']))
  {
    $form['email-input'] = $_POST['email-input'];
  }

  $form['user-input-chk-state'] = '';
  if (isset($_POST['user-input']) && $_POST['user-input'] == 'photographer')
  {
    $form['user-input-chk-state'] = 'checked';
  }

  //Authentificate user
  if(isset($_POST['submit']))
  {
    //Get user type
    if(isset($_POST['user-input']) && $_POST['user-input'] == 'photographer')
    {
      $logInAs = 'photographer';
    } else {
      $logInAs = 'client';
    }

    //Verify password
    if($_POST['email-input'] != '' && $_POST['password-input'] != '')
    {
      $auth = new Authentificator();
      try {
        //Verify Login name
        switch($logInAs) {
          case 'client':
          $idUser = $auth->loginClient($_POST['email-input'], $_POST['password-input']);
          break;
          case 'photographer':
          $idUser = $auth->loginPhotographer($_POST['email-input'], $_POST['password-input']);
          break;
        }
        //Process returned result
        if ($idUser != false)
        {
          $info['message'] = '<div class="txt-green">Authentification réussie.</div>';
          $dao = new DAO();
          switch($logInAs) {
            case 'client':
            $_SESSION['user'] = new Client($dao->getClientById($idUser));
            header("Location: ./client.php");
            break;
            case 'photographer':
            $_SESSION['user'] = new Photographer($dao->getPhotographerById($idUser));
            header("Location: ./photographer.php");
            break;
          }
        } else {
          $info['message'] = '<div class="txt-red">Authentification échouée.</div>';
        }
      } catch (Exception $e) {
        if ($e instanceof NotFoundDBException) {
          $info['message'] = '<div class="txt-red">E-mail Inconnu.</div>';
        } else if ($e instanceof DisabledAccountException) {
          $info['message'] = '<div class="txt-red">Compte désactivé.</div>';
        } else {
          print_r($e);
          die();
        }
      }
    } else {
      $info['message'] = '<div class="txt-red">Veuillez compléter les deux champs.</div>';
    }
  }
?>


<?php //###################################################### ?>


<?php $htmlTitle = "Connexion — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = ""; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<main>
  <div class="block">
    <div class="block-title">Connexion</div>
    <div class="block-content">
      <form action="login.php" method="post">

        <div class="form-group flexH flex-align-center">
          <div class="form-switch-left-label">Client</div>
          <label class="form-switch">
            <input name="user-input" type="checkbox" value="photographer" <?= $form['user-input-chk-state'] ?>>
            <span class="form-switch-slider-round"></span>
          </label>
          <div class="form-switch-right-label">Photographe</div>
        </div>

        <div class="form-group">
          <label>Email*</label>
          <input class="form-control" name="email-input" type="text" value="<?= $form['email-input'] ?>">
        </div>

        <div class="form-group">
          <label>Mot de passe*</label>
          <input class="form-control" name="password-input" type="password">
        </div>

        <?= $info['message'] ?>

        <div class="form-group flexH flex-align-justify">
          <a class="form-signup" href="./signup.php">Pas encore inscrit ?</a>
          <input class="btn btn-default btn-blue-dark" name="submit" type="submit" value="Se connecter">
        </div>
      </form>
    </div>
  </div>
</main>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
