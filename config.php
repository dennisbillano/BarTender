<?

######################################################################################################
# Web IO Pi Configuration
######################################################################################################

  define("WEBIO_URL","http://localhost:8000");
  define("WEBIO_AUTH_USER","webiopi");
  define("WEBIO_AUTH_PASS","raspberry");


######################################################################################################
# GPIO PIN TO PORT MAPPING (based on wiring of pi to relay board, and relay board to motors)
######################################################################################################
 
  define("GPIO_0","17");
  define("GPIO_1","18");
  define("GPIO_2","27");
  define("GPIO_3","22");
  define("GPIO_4","23");
  define("GPIO_5","24");
  define("GPIO_6","25");
  define("GPIO_7","4");

  define("PUMP_0",GPIO_0);
  define("PUMP_1",GPIO_1);
  define("PUMP_2",GPIO_2);
  define("PUMP_3",GPIO_3);
  define("PUMP_4",GPIO_4);
  define("PUMP_5",GPIO_5);
  define("PUMP_6",GPIO_6);
  define("PUMP_7",GPIO_7);



######################################################################################################
# Ingredients to pump mapping
######################################################################################################
 
  $_INGREDIENTS['Black Label'] = PUMP_0;
  $_INGREDIENTS['Jack Daniel\'s'] = PUMP_1;
  $_INGREDIENTS['Vodka'] = null;
  $_INGREDIENTS['Water'] = PUMP_2;
  $_INGREDIENTS['Tonic'] = PUMP_3;
  $_INGREDIENTS['Lime'] = PUMP_4;
  $_INGREDIENTS['Tomato Juice'] = null;
  $_INGREDIENTS['Coke'] = PUMP_5;
  $_INGREDIENTS['Sprite'] = PUMP_6;
  $_INGREDIENTS['Beer'] = PUMP_7;

  define("RECIPE_DIR","recipes/");
