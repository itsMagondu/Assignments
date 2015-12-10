<?php
require_once "lib/nusoap.php";
 
//$client = new nusoap_client("http://localhost/web/cdt504/webservice/server.php");
//$error  = $client->getError();


//$method = $_GET['method'];
//$num = $_GET['num'];

//if (!ctype_digit($num)) {
//echo "<h2>Error: Input is not a number</h2>";
//}
//else
//{
//echo $method;
//if ($error) {
//    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
//}
 
//if ($method === "fibList")
//{
//$result = $client->call("math.fibList", array("num" => $num));
//}
//elseif ($method === "fibNum")
//{
//$result = $client->call("math.fibNum", array("num" => $num));
//}
//else
//{
//echo "<h2>Error: No Method defined</h2>";
//}

//if ($client->fault) {
//    echo "<h2>Fault</h2><pre>";
//    print_r($result);
//    echo "</pre>";
//} else {
//    $error = $client->getError();
//    if ($error) {
//        echo "<h2>Error</h2><pre>" . $error . "</pre>";
//    } else {
//      	echo "<h2>Here is your fibonnaci result for number: $num </h2>";
//        echo $result;
//    }
//}
//}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>CDT 502 | Fibbonaci Web Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a web interface that takes advantage of the fibonnaci web service">
    <meta name="author" content="Magondu Njenga">

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">


    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">


    <link href="scripts/wookmark/css/style.css" rel="stylesheet" type="text/css" /> <link href="scripts/yoxview/yoxview.css" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">


    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript">
    function validateandget()
 {
    
    var fibnumber=document.enq.number.value;
    var number_exp=/^[0-9]/;
    if(fibnumber=='')
    {
        alert("Number Should Not Be Empty!");
        document.enq.number.focus();
        return false;
    }
    else if(!fibnumber.match(number_exp))
    {
        alert("Invalid Number!");
        document.enq.number.focus();
        return false;
    }
    else 
    {
        //make a js call to the server and get results
    }    

    }
    return true;
 }

    </script>
</head>
<body id="pagebody">
    <div id="divBoxed" class="container">
     <div class="contentArea">
          <div class="divPanel notop page-content">
             <div class="row-fluid">
                <div class="span8" id="divMain">

                    <h1>Welcome to the Fibbonaci Page</h1>

                    <form name="enq" method="get" action="/web/cdt504/webservice/server.php" onsubmit="return valideandget();">
  <fieldset>
    
    <input type="number" name="number" id="number" value=""  class="input-block-level" placeholder="Enter Number" />
    <div class="actions">
    <input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn btn-info pull-right" title="Click here to submit your message!" />
    </div>
    
    </fieldset>
    <table>
    </table>
</form>             
                </div>
            </div>
          </div>
     </div>
    </div>

   
</body>
 
<?php 
// show soap request and response
//echo "<h2>Request</h2>";
//echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
//echo "<h2>Response</h2>";
//echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>