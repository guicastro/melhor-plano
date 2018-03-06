<?php 

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once("../core/config.php");

    require_once("../vendor/autoload.php");

    $result["server"] = print_r($_SERVER, true);
    $result["request"] = print_r($_REQUEST, true);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $result["ch"] = print_r($ch, true);
    
    // get the HTTP method, path and body of the request
    $result["test"]["method"] = $_SERVER['REQUEST_METHOD'];
    $test_request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
    $result["test"]["request"] = print_r($test_request, true);
    $result["test"]["input"] = json_decode(file_get_contents('php://input'),true);
    
    // retrieve the table and key from the path
    $result["test"]["table"] = preg_replace('/[^a-z0-9_]+/i','',array_shift($test_request));
    $result["test"]["key"] = array_shift($test_request)+0;
    
    
    if (($stream = fopen('php://input', "r")) !== FALSE) {

        $result["test"]["stream"] = print_r(stream_get_contents($stream), true);
    }

    echo json_encode($result);