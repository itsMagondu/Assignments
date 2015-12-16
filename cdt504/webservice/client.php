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

    <style type="text/css">
    body {
        padding-left: 11em;
        font-family: Georgia, "Times New Roman", Times, serif;
        color: #7d4627;
        background-color: #c9c9c9;
    }

    h1 {
        font-family: Helvetica, Geneva, Arial, SunSans-Regular, sans-serif;
    }  
    </style>

    <script type="text/javascript">
    function validateandget()
    {

        var fibnumber=document.fibform.fibnum.value;
        var choice =document.fibform.fibtye.value;
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
            <?php 
            $client = new nusoap_client("http://localhost/msc/cdt504/webservice/server.php");
            $error  = $client->getError();

            if (choice === "list")
            {
                $result = $client->call("math.fibList", array("num" => $num));
            }
            elseif (choice === "num")
            {
                $result = $client->call("math.fibNum", array("num" => $num));
            }
            else
            {
                //alert("An error occured");
            }

            ?>
        }    

    }
    return true;
}

</script>
</head>
<body>
    <div id="divBoxed" class="container">
        <h1>Welcome to the Fibbonaci Page</h1>

        <form name="fibform" method="get" onsubmit="return valideandget();">
            Enter Number: <input type="numer" name="fibnum"><br><br>
            <input type="radio" name="fibnumber" value="num" checked>Number
            <input type="radio" name="fibtype" value="list">List <br><br>
            <input type="submit" value="Submit">
        </form>             
    </div>
</body>

<?php 
// show soap request and response
//echo "<h2>Request</h2>";
//echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
//echo "<h2>Response</h2>";
//echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>