<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/Subject.php";

echo "Testiram AUT\n";

//$subject = new Subject(8, "Marija", 'Petkovic', 'test naslov', 2000, 'Mb', 454565, 2155455);
//var_dump((object)$subject);
$subject = new Subject(
	1, "Andreja", "Vidovic", "Pri jezu 6", 2000, "Maribor", 123456789, "031346765"
);
	try {
  		$client = new SoapClient(
				"https://incubator.alcyone.si/soaptest/postar/postar.wsdl", 
				array( 
					'cache_wsdl' => WSDL_CACHE_NONE, 
					'trace' => 1,
					'exceptions' => true
				)
		);
		var_dump($client->__getFunctions());
		$response = $client->__soapCall("redirect", array($subject));
		var_dump($response);
  	}  catch (\Exception $ex) {
            var_dump($ex);
        }
	

?>