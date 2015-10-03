<?php
require_once "lib/nusoap.php";
 
class math {
    public function fibNum($num)
    {
    // based on http://stackoverflow.com/questions/15600041/php-fibonacci-sequence
    return round(pow((sqrt(5)+1)/2, $num) / sqrt(5));
    }

    public function fibList($num){
     $fibarray = array(0, 1);
     for ( $i=2; $i<=$num; ++$i ) {
     	 $fibarray[$i] = $fibarray[$i-1] + $fibarray[$i-2];
 	 }	       
	 return implode(",", $fibarray);
    }

}
 
$server = new soap_server();
$server->configureWSDL("CDT504 Fibonnaci service", "http://localhost/cdt504/webservice/");
 
$server->register("math.fibNum",
    array("type" => "xsd:number"),
    array("return" => "xsd:number"),
    "http://localhost/cdt504/webservice/",
    "http://localhost/cdt504/webservice/#fib",
    "rpc",
    "encoded",
    "Get fibonnaci number based on input");

$server->register("math.fibList",
    array("type" => "xsd:number"),
    array("return" => "xsd:numberArray"),
    "http://localhost/cdt504/webservice/",
    "http://localhost/cdt504/webservice/#fibList",
    "rpc",
    "encoded",
    "Get fibonnaci array based on input");
 
@$server->service($HTTP_RAW_POST_DATA);
