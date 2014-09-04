<?php

class Recipe {

   var $filename;
   var $name;
   var $description;
   var $ingredients;

   function load($recipeFileName){

      if(substr($recipeFileName, -7)!=".recipe")
         $recipeFileName = $recipeFileName.".recipe";
      
      if(!file_exists(RECIPE_DIR.$recipeFileName))
         return false;

      $this->filename = $recipeFileName;

      $fromIni = parse_ini_file(RECIPE_DIR.$recipeFileName, true);

      //echo "<pre>".print_r($fromIni,true)."</pre>";
      $this->name = $fromIni['details']['name']; 	  
      $this->description = $fromIni['details']['description']; 	  

      $i=0;
      $this->ingredients = Array();

      while(!empty($fromIni['ingredient'.$i])){
         $this->ingredients[$i]->name = $fromIni['ingredient'.$i]['name'];
         $this->ingredients[$i]->percentage = $fromIni['ingredient'.$i]['percentage'];
         $i++;
      }
  
      return true; 
   }

}
