<?php
	//Include dependencies
	use \BeltranPhotoStock\Model\SessionManager;
	require_once('model/SessionManager.php');
	use \BeltranPhotoStock\Model\Client;
	require_once('model/Client.php');
	use \BeltranPhotoStock\Model\CartItem;
	require_once('model/CartItem.php');
	use \BeltranPhotoStock\Model\DAO;
	require_once('model/DAO.php');
	
	$user = SessionManager::getAuthenticatedUser();
	if(! $user instanceof Client) {
		header('Location: ./login.php');
	}
	$cart = $user->getCart();
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
		
		<?php ob_start(); ?>
		
		<?php
			$index = 0;
			$priceTotal = 0;
			foreach ($cart as $item) {
				$img = DAO::getImageById($item->getIdImage());
				$photographer = DAO::getPhotographerById($img['id_photographe'])->getData();
				$view['photographer'] = $photographer['prenom'].' '.$photographer['nom'];
				
				$support['prixHT'] = '0.10';
				
				$itemPriceTotal = $img['prixHT'] + $support['prixHT'];
				$priceTotal += $itemPriceTotal;
				
				$view['item-price-image'] = str_replace('.',',',number_format($img['prixHT'], 2));
				$view['item-price-support'] = str_replace('.',',',number_format($support['prixHT'], 2));
				$view['item-price-total'] = str_replace('.',',',number_format($itemPriceTotal, 2));
				?>
							<form id="<?= 'cart-item-'.$index ?>" action="./cartOperations.php?indexItem=<?= $index ?>" method="post">
								
								<div class="block-content cart-item">
									<div class="item-buttons">
										<button class="item-buttons-delete" type="submit" name="submit-item" value="del"><img src="./public/assets/icon-delete.svg"></button>
										<button class="item-buttons-duplicate" type="submit" name="submit-item" value="dup"><img src="./public/assets/icon-add.svg"></button>
									</div>
									<div class="item-img">
										<img src=".\public\images\<?= $img['filename'] ?>">
									</div>
									<div class="item-details">
										<a class="item-title" href="./image.php?id_image=<?= $img['id_image'] ?>">
						<?= $img['titre'] ?>
										</a>
										<div class="item-author">
						<?= $view['photographer'] ?>
										</div>
										<div class="item-label">
											Quantité :
											<input class="form-control form-control-sm" name="quantity" type="number" value="1">
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
						<?= $view['item-price-total'] ?> EUR/u
										</div>
										<div class="item-price-element">
											<div class="item-price-title">Image</div>
											<div class="item-price-value"><?= $view['item-price-image'] ?> EUR/u</div>
										</div>
										<div class="item-price-element">
											<div class="item-price-title">Support</div>
											<div class="item-price-value"><?= $view['item-price-support'] ?> EUR/u</div>
										</div>
									</div>
								</div>
							
							</form>
				<?php
				$index++;
			}
		?>
		
		<?php $htmlCartItems = ob_get_clean(); ?>
		
		<?php
			if($index == 0) {
		  	$view['btn-order-disabled'] = 'disabled';
			} else {
		  	$view['btn-order-disabled'] = '';
			}
			$view['price-total'] = str_replace('.',',',number_format($priceTotal, 2));
		?>
			<div class="flexH flex-align-justify">
				<h1>Mon panier</h1>
				<form class="flexH" action="cartOperations.php" method="post">
					<button id="btn-empty" class="btn btn-default btn-blue-dark" name="submit-cart" type="submit" value="reset">Vider le panier</button>
					<button id="btn-order" class="btn btn-default btn-green" name="submit-cart" type="submit" value="order" <?= $view['btn-order-disabled'] ?>>Passer commande</button>
					<div id="order-totalprice">
						<div class="txt-blue-hard">Total TTC</div>
						<div><?= $view['price-total'] ?> EUR</div>
					</div>
				</form>
			</div>
			<span class="separator"></span>
		
		<?= $htmlCartItems ?>
		
		</div>
	</section>
</main>


<?php require('./_footer.php'); ?>

<?php //-- END BODY ------------------------------------------ ?>
<?php $htmlBody = ob_get_clean(); ?>


<?php	require('./_template.php'); ?>
