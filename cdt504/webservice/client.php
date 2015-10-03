<?php
require_once ('lib/nusoap.php');
$client = new nusoap_client("http://localhost/cdt504/webservice/server.php");

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("getFib", array("number" => 5));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Books</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}

//Above is just the sample code. Create one that gives the fibonacci sequence up to a number less than the input.