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

  #flow rate in ml/sec
  define("PUMP_FLOW_RATE",15);


######################################################################################################
# Ingredients to pump mapping
######################################################################################################
 
  $_INGREDIENTS['BLACK LABEL'] = PUMP_0;
  $_INGREDIENTS['JACK DANIELS'] = PUMP_1;
  $_INGREDIENTS['VODKA'] = null;
  $_INGREDIENTS['WATER'] = PUMP_2;
  $_INGREDIENTS['TONIC'] = PUMP_3;
  $_INGREDIENTS['LIME'] = PUMP_4;
  $_INGREDIENTS['COKE'] = PUMP_5;
  $_INGREDIENTS['SPRITE'] = PUMP_6;
  $_INGREDIENTS['BEER'] = PUMP_7;

  $_DICTIONARY['BLACK LABEL'] = "noun [blak ley-buh l]  <br/> &nbsp;&nbsp;&nbsp;&nbsp; brand of Scotch Whisky owned by Diageo that originated in Kilmarnock, Ayrshire, Scotland. ";
  $_DICTIONARY['JACK DANIELS'] = "noun [jak dan-yuh l] <br/> &nbsp;&nbsp;&nbsp;&nbsp; brand of Tennessee whiskey that is the highest selling American whiskey in the world.";
  $_DICTIONARY['VODKA'] = "noun [vod-kuh]  <br/> &nbsp;&nbsp;&nbsp;&nbsp; distilled beverage composed primarily of water and ethanol, sometimes with traces of impurities and flavorings.";
  $_DICTIONARY['WATER'] = "noun [waw-ter, wot-er] <br/> &nbsp;&nbsp;&nbsp;&nbsp; the most abundant compound on Earth's surface, covering 70 percent of the planet.";
  $_DICTIONARY['TONIC'] = "noun [ton-ik] <br/> &nbsp;&nbsp;&nbsp;&nbsp; carbonated soft drink, in which quinine is dissolved. Originally used as a prophylactic against malaria, tonic water usually now has a significantly lower quinine content and is consumed for its distinctive bitter flavour.";
  $_DICTIONARY['LIME'] = "noun [lahym] <br/> &nbsp;&nbsp;&nbsp;&nbsp; citrus fruit which is typically round, green, 3-6 centimetres (1.2-2.4 in) in diameter, and containing sour (acidic) pulp";
  $_DICTIONARY['COKE'] = "noun [kohk] <br/> &nbsp;&nbsp;&nbsp;&nbsp; carbonated soft drink sold in stores, restaurants, and vending machines throughout the world";
  $_DICTIONARY['SPRITE'] = "noun [sprahyt] <br/> &nbsp;&nbsp;&nbsp;&nbsp; colorless, lemon-lime flavored, caffeine-free soft drink, created by the Coca-Cola Company";
  $_DICTIONARY['BEER'] = "noun [beer] <br/> &nbsp;&nbsp;&nbsp;&nbsp; an alcoholic beverage made by brewing and fermentation from cereals, usually malted barley, and flavored with hops and the like for a slightly bitter taste.";


  #all values in ml
  $_DRINKSIZE['Large'] = 350;
  $_DRINKSIZE['Medium'] = 250;
  $_DRINKSIZE['Double'] = 80;
  $_DRINKSIZE['Shot'] = 40;

  define("RECIPE_DIR","recipes/");
