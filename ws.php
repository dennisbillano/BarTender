<?php

require_once("config.php");
require_once("lib/functions.php");

if(!empty($_GET['action']) && !empty($_GET['gpioPin'])){

   switch(strtoupper($_GET['action'])){

      case("RUN"):
         runPump($_GET['gpioPin']);
      break;

      case("STOP"):
         stopPump($_GET['gpioPin']);
      break;

   }

}
