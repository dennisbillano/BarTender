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
  {
    echo " <b><span style=\"color:#fff;\">(Not Available)</span></b>";
    $notavailable = true;
  }
  if($_DICTIONARY[$ingredient->name] != null)
    echo " <span class=\"dictionary\"><i>".$_DICTIONARY[$ingredient->name]."</i></span> \n";
  echo "</p>";
}

echo "<div class=\"backButton button\" onClick=\"window.location='index.php';\">Back</div> \n";
if($notavailable != true)
{
  echo "<div class=\"largeSize button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."&drink_size=Large';\">Large cup</div> \n";
  echo "<div class=\"mediumSize button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."&drink_size=Large';\">Medium cup</div> \n";
  echo "<div class=\"shotSize button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."&drink_size=Large';\">Shot</div> \n";
  echo "<div class=\"doubleSize button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."&drink_size=Large';\">Double</div> \n";
}
else
{
  echo "<div class=\"notAvailable\";\">Sorry, this drink isn't available</div> \n";
}

include_once("templates/footer.php");
