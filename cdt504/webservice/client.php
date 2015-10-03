<?php
require_once "lib/nusoap.php";
 
$client = new nusoap_client("http://localhost/cdt504/webservice/server.php");
$error  = $client->getError();
 
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
 
$result = $client->call("math.fibList", array("num" => 12));
 
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
      	echo "<h2>Here is a list of Fibbonaci numbers up to 12</h2>";
        echo $result;
    }
}
 
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

//Above is just the sample code. Create one that gives the fibonacci sequence up to a number less than the input.