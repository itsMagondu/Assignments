<?php
require_once "lib/nusoap.php";
 
$client = new nusoap_client("http://localhost/cdt504/webservice/server.php");
$error  = $client->getError();


$method = $_GET['method'];
$num = $_GET['num'];

if (!ctype_digit($num)) {
echo "<h2>Error: Input is not a number</h2>";
}
else
{
echo $method;
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
 
if ($method === "fibList")
{
$result = $client->call("math.fibList", array("num" => $num));
}
elseif ($method === "fibNum")
{
$result = $client->call("math.fibNum", array("num" => $num));
}
else
{
echo "<h2>Error: No Method defined</h2>";
}

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
      	echo "<h2>Here is your fibonnaci result for number: $num </h2>";
        echo $result;
    }
}
} 
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

//Above is just the sample code. Create one that gives the fibonacci sequence up to a number less than the input.