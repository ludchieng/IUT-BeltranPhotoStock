<?php
  if(!isset($searchTitle)) {
    $searchTitle = "Explorer";
  }
  if(isset($_POST['search'])) {
    $searchArgs = $_POST['search'];
  } else {
    $searchArgs = "";
  }
?>

<section id="search" class="bg-img-images">
  <div id="search-content" class="container-fluid">
    <div id="search-title"><?= $searchTitle ?></div>
    <form id="search-bar" class="flexH" action="./results.php" method="post">
      <button type="submit"><img src="./public/assets/icon-search.svg"></button>
      <input class="form-control" name="search" type="text" placeholder="Rechercher..." value="<?= $searchArgs ?>">
    </form>
  </div>
  <script src="public/js/search-sticky-onscroll.js"></script>
</section>
