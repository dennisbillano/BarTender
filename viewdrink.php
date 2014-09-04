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
echo "<h3>Ingredients</h3>";

foreach($drink as $i){
  echo $i['ingredient'];
  if($_INGREDIENTS[$i['ingredient']] == null)
    echo " - Not Available";
  echo "<br/>";
}

echo "<br/><br/>";
echo "<a href=\"index.php\">Back</a> \n";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a href=\"makedrink.php?recipe=".$_GET['recipe']."\">Make Drink</a> \n";

include_once("templates/footer.php");
