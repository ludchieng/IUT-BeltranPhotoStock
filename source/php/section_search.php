<h1>Explorer</h1>
<form action="results.php" method="get">
  <input type="text" name="search" placeholder="Rechercher"value=<?php echo '"';if(isset($_GET['search'])) {echo $_GET['search'];}echo '"';?> /><br/>
  <input type="submit" value="Rechercher"/>
</form>
