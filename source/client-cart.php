<?php

?>


<?php //###################################################### ?>


<?php $htmlTitle = "Espace Client — BeltranPhotoStock"; ?>
<?php $htmlSpecificCSS = "./public/styles/_client-cart.css"; ?>


<?php ob_start(); ?>
<?php //-- BODY ---------------------------------------------- ?>

<?php require('./_header.php'); ?>
<section id="header-offset"></section>

<main class="user-area">
  <?php	require('./_aside-client.php'); ?>
  <section>
    <div class="w1000">

      <div class="flexH flex-align-justify">
        <h1>Mon panier</h1>
        <form class="flexH" action="#" method="post">
          <button id="btn-empty" class="btn btn-default btn-blue-dark w-fullW" name="submit" type="submit" value="empty">Vider le panier</button>
          <button id="btn-order" class="btn btn-default btn-green w-fullW" name="submit" type="submit" value="order">Passer commande</button>
          <div id="order-totalprice">
            <div class="txt-blue-hard">Total TTC</div>
            <div>168,00 EUR</div>
          </div>
        </form>
      </div>
      <span class="separator"></span>

      <form action="#" method="post">

        <div class="block-content cart-item">
          <div class="item-buttons">
            <button class="item-buttons-delete" type="submit"><img src="./public/assets/icon-delete.svg"></button>
            <button class="item-buttons-duplicate" type="submit"><img src="./public/assets/icon-add.svg"></button>
          </div>
          <div class="item-img">
            <img src=".\public\images\landscape-scenic-going-to-the-sun-road-rocky-mountains-163550.jpg">
          </div>
          <div class="item-details">
            <div class="item-title">
              Constias o dolor officia aut se malis excepteur imitarentur
            </div>
            <div class="item-author">
              aliqua cohaerescant
            </div>
            <div class="item-label">
              Quantité :
              <input class="form-control form-control-sm" name="quantity" type="number">
            </div>
            <div class="item-label">
              Support :
              <select class="form-control form-control-sm">
                <option>Papier photo</option>
                <option>Toile</option>
              </select>
            </div>
            <div class="item-label">
              Dimension :
              <select class="form-control form-control-sm">
                <option>10x15</option>
                <option>15x17</option>
                <option>20x30</option>
              </select>
            </div>
          </div>
          <div class="item-prices">
            <div class="item-price-total">
              84,00 EUR
            </div>
            <div class="item-price-element">
              <div class="item-price-title">Photo</div>
              <div class="item-price-value">12,00 EUR/u</div>
            </div>
            <div class="item-price-element">
              <div class="item-price-title">Support</div>
              <div class="item-price-value">30,00 EUR/u</div>
            </div>
          </div>
        </div>

      </form>

    </div>
  </section>
</main>


<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
