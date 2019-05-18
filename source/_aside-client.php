<?php
  //Load user profile picture
  if(!isset($view['user-picture'])) {
    if(isset($_SESSION['user'])) {
      $user = unserialize($_SESSION['user']);
      $view['user-picture'] = $user->getPictureSrc();
    } else {
      $view['user-picture'] = "./public/assets/img-profile-picture.png";
    }
  }
?>

<aside>
  <div id="profile-picture">
    <img src="<?= $view['user-picture']?>">
  </div>
  <div class="user-name">
    Jean Dupont
  </div>
  <ul>
    <li><a href="client-cart.php">Mon panier</a></li>
    <li><a href="client.php">Mes commandes</a></li>
    <li><a href="client-informations.php">Mes informations</a></li>
    <li><a href="client-collections.php">Mes collections privées</a></li>
  </ul>
</aside>
