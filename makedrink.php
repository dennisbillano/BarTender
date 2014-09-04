<?php

include_once("config.php");
include_once("lib/functions.php");
include_once("templates/header.php");

verifyRecipe($_GET['recipe']);

include_once(RECIPE_DIR.$_GET['recipe'].".recipe");

initializePumps();
foreach($drink as $i){
  if($_INGREDIENTS[$i['ingredient']] != null){
    echo "Pouring ".$i['ingredient']."..";
    pump($i['ingredient'],$i['duration']);
    echo "   Done. \n";
  }
}

echo "Done!";

echo "<meta http-equiv='refresh' content='2; url=index.php'>";
include_once("templates/footer.php");
