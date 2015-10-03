<?php
require_once ('lib/nusoap.php');
$URL       = "localhost/cdt504/webservice/";
$namespace = $URL . '?wsdl';

function getProd($category) {
    if ($category == "books") {
        return join(",", array(
            "The WordPress Anthology",
            "PHP Master: Write Cutting Edge Code",
            "Build Your Own Website the Right Way"));
	    }
	    else {
            return "No products listed under that category";
	    }
}

function getFib($number) {
    return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
}

$server  = new soap_server;
$server->configureWSDL('CDT 504 Web Service Test', $namespace);

$server->register("getFib");
$server->service($HTTP_RAW_POST_DATA);
