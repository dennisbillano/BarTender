<?php

include_once("config.php");
include_once("lib/functions.php");

include_once("templates/header.php");

echo "<h1>Drink menu</h1>";
echo "<table>\n";

$recipes = getRecipes();
foreach($recipes as $recipe){
  echo "  <tr> \n";
  echo "    <td>$recipe</td> \n";
  echo "    <td><a href=\"viewdrink.php?recipe=$recipe\">View Drink</td> \n";
  echo "  </tr> \n";
}

echo "</table> \n";

include_once("templates/footer.php");
