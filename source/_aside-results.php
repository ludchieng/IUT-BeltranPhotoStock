<?php
	$fields = [
			'sort' => [
					'oldest','newest','cheapest','costliest'
			],
			'sort-label' => [
					'du plus ancien au plus récent',
					'du plus récent au plus ancien',
					'du moins cher au plus cher',
					'du plus cher au moins cher'
			],
			'theme' => [
				'1','2','3','4',
				'5','6','7','8','9',
				'10','11','12','13',
				'14','15','16'
			],
					/*
			'theme' => [
					'science','technologie','architecture','abstrait',
					'sport','culture','nature','musique','urbain',
					'paysage','industrie','lifestyle','nourriture',
					'art','voyage','animaux'
			],*/
			'theme-label' => [
					'Science','Technologie','Architecture','Abstrait',
					'Sport','Culture','Nature','Musique','Urbain',
					'Paysage','Industrie','Lifestyle','Nourriture',
					'Art','Voyage','Animaux'
			],
			'orientation' => [
					'horizontal','vertical','panoramique','carre'
			],
			'orientation-label' => [
					'Horizontal','Vertical','Panoramique','Carre'
			],
			'size' => [
					'xlarge','large','medium','small'
			],
			'size-label' => [
					'Très grande (> 2200 px)','Grande (> 1200 px)',
					'Moyenne (> 700 px)','Petite (< 700 px)'
			]
  ];
?>

<aside>
  <fieldset class="chkfields white">
    <h1>Trier par...</h1>
		
		<?php
				for($i = 0; $i < count($fields['sort']); $i++) {
					if(isset($_POST['sort']) && $_POST['sort'] == $fields['sort'][$i]) {
						// Previous value
			  		$checked['sort'] = 'checked';
					} else if (!isset($_POST['submit']) && $fields['sort'][$i] == 'newest') {
						// Default value
			  		$checked['sort'] = 'checked';
					}	else {
			  		$checked['sort'] = '';
					}
		?>
			<label>
				<input type="radio" name="sort" value="<?= $fields['sort'][$i] ?>" <?= $checked['sort'] ?>>
				<span class="cell-radio"><span class="fill-radio"></span></span>
				<?= $fields['sort-label'][$i] ?>
			</label>
		<?php } ?>
		
  </fieldset>
	
  <fieldset class="chkfields white wrap">
    <h1>Filtrer par...</h1>
    <h2>Thème(s)</h2>
    <div class="flex-wrap flexV" style="max-height: 16em; align-items: flex-start;">
	
			<?php
					for($i = 0; $i < count($fields['theme']); $i++) {
						$current = $fields['theme'][$i];
						if((isset($_POST['theme-'.$current]) && $_POST['theme-'.$current] == 'true') || !isset($_POST['submit'])) {
							$checked[$current] = 'checked';
						} else {
							$checked[$current] = '';
						}
			?>
				<label>
					<input type="checkbox" name="<?= 'theme-'.$current ?>" value="true" <?= $checked[$current] ?>>
					<span class="cell-chk"><span class="fill-chk"></span></span>
					<?= $fields['theme-label'][$i] ?>
				</label>
			<?php } ?>

    </div>
  </fieldset>
	
  <fieldset class="chkfields white wrap" style="display: none">
    <h2>Orientation(s)</h2>
	
			<?php
					for($i = 0; $i < count($fields['orientation']); $i++) {
						$current = $fields['orientation'][$i];
						if((isset($_POST[$current]) && $_POST[$current] == 'true') || !isset($_POST['submit'])) {
							$checked['orientation'] = 'checked';
						} else {
							$checked['orientation'] = '';
						}
			?>
			<label>
				<input type="checkbox" name="<?= $current ?>" value="true" <?= $checked['orientation'] ?>>
				<span class="cell-chk"><span class="fill-chk"></span></span>
				<?= $fields['orientation-label'][$i] ?>
			</label>
	  <?php } ?>

  </fieldset>

  <fieldset>
    <h2>Prix</h2>
    <label style="margin-right: 16px;">
      <input class="txtf-shrt" type="text" name="price-min" value="<?= $form['price-min'] ?>"><br/>
      Min.
    </label>
    <label>
      <input class="txtf-shrt" type="text" name="price-max" value="<?= $form['price-max'] ?>"><br/>
      Max.
    </label>
  </fieldset>
	
  <fieldset class="chkfields white wrap" style="display: none">
    <h2>Taille (largeur)</h2>
		
	  <?php
		  for($i = 0; $i < count($fields['size']); $i++) {
			  if(isset($_POST['size']) && $_POST['size'] == $fields['size'][$i]) {
				  // Previous value
				  $checked['size'] = 'checked';
			  } else if (!isset($_POST['submit']) && $fields['size'][$i] == 'medium') {
				  // Default value
				  $checked['size'] = 'checked';
			  }	else {
				  $checked['size'] = '';
			  }
		?>
			<label>
				<input type="radio" name="size" value="<?= $fields['size'][$i] ?>" <?= $checked['size'] ?>>
				<span class="cell-radio"><span class="fill-radio"></span></span>
				<?= $fields['size-label'][$i] ?>
			</label>
	  <?php } ?>
		
  </fieldset>
</aside>
