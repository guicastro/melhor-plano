<?php

namespace Services;

class Database {

    protected $Database;

    public function __construct() {

        $this->setDatabase();
    }

    protected function setDatabase() {

        ob_start();
        include "../config/database.php";
        $database = ob_get_clean();
        ob_end_clean();
        
        $this->Database = json_decode($database);
    }

    public function render() {

        return $this->Database;
    }
    
}