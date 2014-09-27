<?

include_once(dirname(__FILE__)."/recipemodel.php");

function initializePumps(){
   setIODirection(PUMP_0, "out");
   setIODirection(PUMP_1, "out");
   setIODirection(PUMP_2, "out");
   setIODirection(PUMP_3, "out");
   setIODirection(PUMP_4, "out");
   setIODirection(PUMP_5, "out");
   setIODirection(PUMP_6, "out");
   setIODirection(PUMP_7, "out");
}


function setIODirection($GPIONumber, $direction){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$GPIONumber."/function/".$direction);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);
}

function reversePump($ingredient){
   global $_INGREDIENTS;
   global $_PUMPS;

   flush();
   ob_flush();
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".REVERSE_PIN."/value/1");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$_INGREDIENTS[$ingredient]."/value/1");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);
   
   flush();
   ob_flush();


   usleep(REVERSE_TIME*1000000);
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$_INGREDIENTS[$ingredient]."/value/0");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".REVERSE_PIN."/value/0");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);

}


function pump($ingredient, $volume){

   global $_INGREDIENTS;
   global $_PUMPS;

   flush();
   ob_flush();

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$_INGREDIENTS[$ingredient]."/value/1");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);

   flush();
   ob_flush();
    
   usleep((($volume/$_PUMPS[$_INGREDIENTS[$ingredient]])+REVERSE_TIME)*1000000);

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$_INGREDIENTS[$ingredient]."/value/0");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);

}

function runPump($GPIOPin){

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$GPIOPin."/value/1");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);

}

function stopPump($GPIOPin){

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_URL, WEBIO_URL."/GPIO/".$GPIOPin."/value/0");
   curl_setopt($ch, CURLOPT_USERPWD, WEBIO_AUTH_USER.":".WEBIO_AUTH_PASS);
   curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
   curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_exec($ch);
   curl_close($ch);

}


function getRecipes() {
  $recipes = Array();
  $files = scandir(RECIPE_DIR);
  foreach($files as $file){
    if(substr($file,-7)==".recipe"){
       $recipe = new Recipe();
       $recipe->load($file);
       $recipes[] = $recipe;
    }
  }
  return $recipes;
}


function redirect($path){
  //Javascript
  echo "<script>window.location='".$path."';</script> \n";

  //Meta/HTML
  //echo "<meta http-equiv='refresh' content='0; url=$path'> \n";
}


function verifyRecipe($recipe=""){
  if($recipe=="")
    redirect("index.php");
  if(!file_exists(RECIPE_DIR.$recipe.".recipe") && !file_exists(RECIPE_DIR.$recipe))
    redirect("index.php");
}

