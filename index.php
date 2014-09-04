<?php

include_once("config.php");
include_once("lib/functions.php");

include_once("templates/header.php");

echo "<h1 class=\"mainHeading\">Drink menu</h1>";
echo "<table align=\"center\">\n";

$recipes = getRecipes();

$i=0;
foreach($recipes as $recipe){

  if($i%3==0)
    echo "  <tr valign=\"middle\"> \n";

  echo "    <td onClick=\"window.location='viewdrink.php?recipe=$recipe';\" align=\"center\" width=\"350\">\n";
  echo "       <p class=\"name\">$recipe</p> \n";
  echo "       <p class=\"description\">$recipe->description</p> \n";
  echo "    </td> \n";

  $i++;

  if($i%2==0)
    echo "  </tr> \n";

}

echo "</table> \n";

include_once("templates/footer.php");
