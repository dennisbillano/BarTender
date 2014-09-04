<?php

include_once("config.php");
include_once("lib/functions.php");

include_once("templates/header.php");

initializePumps();
?>


<script>

function run(gpioPin){
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET","ws.php?action=run&gpioPin="+gpioPin,true);
  xmlhttp.send();
}

function stop(gpioPin){
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET","ws.php?action=stop&gpioPin="+gpioPin,true);
  xmlhttp.send();
}


</script>


<?php
echo "<h1 class=\"mainHeading\">Tools</h1>";

echo "<div class=\"divider\">.....................................................................................................................................................................</div> \n";
echo "<br/><Br/><br/>";

echo "<table align=\"center\" cellpadding=\"10\"> \n";
echo "  <tr> \n";


for($p=0;$p<=7;$p++){
  echo "    <td width=\"130\" align=\"center\"> \n";
  echo "<h2 style=\"margin-bottom:0px;\">PUMP ".($p+1)."</h2> \n";
  foreach($_INGREDIENTS as $ingredient => $pump){
    if($pump == constant("PUMP_".$p)){
      echo $ingredient;
      echo "<div class=\"button runButton\" onmousedown=\"run($pump);\" onmouseup=\"stop($pump);\" >RUN</div> \n";
    }
  }  
  echo "    </td> \n";
}


echo "  </tr> \n";
echo "</table> \n";

echo "<div class=\"backButton button\" onClick=\"window.location='index.php';\">Back</div> \n";
include_once("templates/footer.php");
