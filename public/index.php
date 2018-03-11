<?php

    header("Access-Control-Allow-Orgin: *");
    header("Access-Control-Allow-Methods: *");

    require_once("../config/config.php");

    require_once("../vendor/autoload.php");    

    $init = new \Routes\Routes;

