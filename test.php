<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/Subject.php";

echo "Testiram AUT\n";

try {
    $client = new SoapClient(
          "https://incubator.alcyone.si/soaptest/erp/erp.wsdl", 
          array( 
              'cache_wsdl' => WSDL_CACHE_NONE, 
              'trace' => 1,
              'exceptions' => true
          )
    );

    var_dump($client->__getFunctions());

    $subject = new Subject(
        5, "Marija", "Petkovic", "Pri jezu 6", 2000, "Maribor", 123456789, "031346765"
    );

    print_r($subject);

    $response = $client->__soapCall("saveErp", array($subject));

    var_dump($response);

} catch (\Exception $ex) {
    echo "*********************************";
    var_dump($ex);
    echo "*********************************";
}
