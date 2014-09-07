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
  $_PUMPS[PUMP_0] = 15;
  $_PUMPS[PUMP_1] = 15;
  $_PUMPS[PUMP_2] = 15;
  $_PUMPS[PUMP_3] = 15;
  $_PUMPS[PUMP_4] = 10;
  $_PUMPS[PUMP_5] = 7;
  $_PUMPS[PUMP_6] = 15;
  $_PUMPS[PUMP_7] = 15;


######################################################################################################
# Ingredients to pump mapping
######################################################################################################
 
  $_INGREDIENTS['JACK DANIELS'] = PUMP_0;
  $_INGREDIENTS['ABSOLUT KURANT'] = PUMP_1;
  $_INGREDIENTS['SOUTHERN COMFORT'] = PUMP_2;
  $_INGREDIENTS['SOUTHERN COMFORT LIME'] = PUMP_3;
  $_INGREDIENTS['CAPTAIN MORGAN'] = PUMP_6;
  $_INGREDIENTS['JOSE CUERVO'] = PUMP_7;
  
  $_INGREDIENTS['SPRITE'] = PUMP_4;
  $_INGREDIENTS['COKE'] = PUMP_5;

  $_DICTIONARY['ABSOLUT KURANT'] = "This superb vodka bears the distinctive flavor of natural Black Currants, which grow throughout Sweden, even above the Arctic Circle.";
  $_DICTIONARY['SOUTHERN COMFORT'] = "In  1874 New Orleans, bartender M.W. Heron crafted a fusion of fruits & spices to create Southern Comfort.";
  $_DICTIONARY['SOUTHERN COMFORT LIME'] = "Some 125 years after M.W. Heron invented Southern Comfort, another bartender reinvented it as SoCo & Lime. Always playful & ready to enjoy, it's a taste that's too good to keep bottled up.";
  $_DICTIONARY['CAPTAIN MORGAN'] = "Captain Henry Morgan, the legendary buccaneer, was appointed Governor of Jamaica in 1680. He was a natural born leader-he and his crewwere famous for their love of adventure and their taste for the finest rum. This very spirit lives on in this secret blend of fine Puerto Rican rums and mellow spice.";
  $_DICTIONARY['JOSE CUERVO'] = "Jose Cuervo Especial Reposado, aged in oak barrels, contains all the magic of the Blue Agave. It makes the perfect Margarita, and drunk straight, is best enjoyed chilled. Jose Cuervo: \"The world's favourite tequila\"";
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
  $_DRINKSIZE['Large'] = 250;
  $_DRINKSIZE['Medium'] = 230;
  $_DRINKSIZE['Double'] = 120;
  $_DRINKSIZE['Shot'] = 40;

  define("RECIPE_DIR","recipes/");
