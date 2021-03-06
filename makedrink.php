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

foreach($recipe->ingredients as $i){
  if($_INGREDIENTS[$i->name] != null){
    echo "<p class=\"progress\">Pouring ".$i->name.".. \n";
    $volume = ($i->percentage * $_DRINKSIZE[$_GET['drink_size']]) / ( 100 );
    pump($i->name,$volume);
    reversePump($i->name);
    echo "&nbsp; DONE.</p> \n";
  }
}

echo "<script> document.getElementById('loader').style.display = 'none'; </script> \n";
echo "<p class=\"progress\">Salute!</p> \n";
echo "<div class=\"sameDrink button\" onClick=\"window.location='makedrink.php?recipe=".$_GET['recipe']."&drink_size=".$_GET['drink_size']."';\">Give me one more</div> \n";
echo "<div class=\"backToMainMenu button\" onClick=\"window.location='index.php';\">Go back to Menu</div> \n";

include_once("templates/footer.php");
