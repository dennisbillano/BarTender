<?php

include_once("config.php");
include_once("lib/functions.php");

include_once("templates/header.php");

echo "<h1 class=\"mainHeading\">Drink menu</h1>";

echo "<div class=\"divider\">.....................................................................................................................................................................</div> \n";
echo "<br/><Br/><br/>";

$recipes = getRecipes();

$i=0;
foreach($recipes as $recipe){

  if($i%3==0)
    echo " <table align=\"center\" class=\"mainMenu\">\n <tr valign=\"middle\"> \n";

  echo "    <td onClick=\"window.location='viewdrink.php?recipe=$recipe->filename';\" align=\"center\" width=\"280\" style=\"padding-left:30px; padding-right:30px; padding-top:15px; padding-bottom:15px;\">\n";
  echo "       <p class=\"name\">$recipe->name</p> \n";
  echo "       <p class=\"description\">$recipe->description</p> \n";
  echo "    </td> \n";

  $i++;

  if($i%3==0)
    echo "  </tr></table> \n";

}

include_once("templates/footer.php");
