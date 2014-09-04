<?php

include_once("config.php");
include_once("lib/functions.php");
include_once("templates/header.php");

verifyRecipe($_GET['recipe']);

$recipe = new Recipe();
$recipe->load($_GET['recipe']);

echo "<h1>$recipe->name</h1>\n";
echo "<div class=\"viewDrinkDescription\"><h3>$recipe->description</h1></div> \n";
echo "<h3 class=\"progressLabel\">Progress</h3>";
echo "<img src=\"images/loader.gif\" class=\"loader\" id=\"loader\" /> ";

initializePumps();

flush();
ob_flush();


foreach($recipe->ingredients as $i){
  if($_INGREDIENTS[$i->name] != null){
    pump($i->name,$i->duration);
    echo "<p class=\"progress\">Done pouring ".$i->name."</p> \n";
  }
  flush();
  ob_flush();
}

echo "<p class=\"progress\">Enjoy your drink!</p> \n";
echo "<script> document.getElementById('loader').style.display = 'none'; </script> \n";
echo "<div class=\"backToMainMenu button\" onClick=\"window.location='index.php';\">Go back to Menu</div> \n";

include_once("templates/footer.php");
