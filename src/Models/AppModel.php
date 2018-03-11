<?php

namespace Models;

use \Functions;
use \Services;

class AppModel {

    public function __construct($method, $args) {

    }

    public function render() {
        
        $App = file_get_contents("../app/index.html");

        $return["render"] = $App;
        
        $return["success"] = true;
    
        return $return;
    }
    

}