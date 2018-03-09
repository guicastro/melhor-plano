<?php 
    header("Access-Control-Allow-Orgin: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once("../config/config.php");

    require_once("../vendor/autoload.php");

    $result["server"] = print_r($_SERVER, true);
    $result["request"] = print_r($_REQUEST, true);
    $result["get"] = print_r($_GET, true);

    $result["script"] = $_SERVER['SCRIPT_FILENAME'];
    $result["origin"] = $_SERVER['HTTP_REFERER'];
    $result["method"] = $_SERVER['REQUEST_METHOD'];
    $result["class"] = $_SERVER['REQUEST_URI'];
    $result["document_root"] = $_SERVER['DOCUMENT_ROOT'];


    echo json_encode($result);