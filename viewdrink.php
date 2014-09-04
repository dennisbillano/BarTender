<?php

include_once("config.php");
include_once("lib/functions.php");
include_once("templates/header.php");

verifyRecipe($_GET['recipe']);

$recipe = new Recipe();
$recipe->load($_GET['recipe']);

echo "<h1>$recipe->name</h1>\n";
echo "<div class=\"viewDrinkDescription\"><h3>$recipe->description</h1></div> \n";

echo "<br/><br/> \n";
echo "<h3 class=\"ingredientsLabel\">Ingredients</h3>";

foreach($recipe->ingredients as $ingredient){
  echo "<p class=\"ingredient\">".$ingredient->name;
  if($_INGREDIENTS[$ingredient->name] == null)
    echo " <b><span style=\"color:#fff;\">(Not Available)</span></b>";
  if($_DICTIONARY[$ingredient->name] != null)
    echo " <span class=\"dictionary\"><i>".$_DICTIONARY[$ingredient->name]."</i></span> \n";
  echo "</p>";
}

echo "<div class=\"backButton button\" onClick=\"window.location='index.php';\">Back</div> \n";
echo "<div class=\"nextButton button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."';\">Make me this drink</div> \n";

include_once("templates/footer.php");
