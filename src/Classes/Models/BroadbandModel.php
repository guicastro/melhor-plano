<?php

namespace Models;

use \Functions;

class BroadbandModel {

    protected $Method;
    protected $Args;
    protected $Data;
    protected $Database;

    public function __construct($method, $args) {

        $this->setMethod($method);
        $this->setArgs($args);
        $this->setData();
    }

    protected function setMethod($method) {

        $this->Method = $method;
    }

    protected function setArgs($args) {

        $this->Args = $args;
    }

    protected function setDatabase($database) {

        $this->Database = $database;
    }

    protected function setData() {

        $ParseData = new Functions\ParseData($this->Method);
        $this->Data = $ParseData->parseData();
    }

    public function ListAll() {
        
        $return["success"] = true;

        $return["error"]["errorCode"] = 400;
        $return["error"]["type"] = "ErrorType";
        $return["error"]["developerMessage"] = "Erro no controller";
        $return["error"]["userMessage"] = "Erro geral";
        $return["error"]["moreInfo"] = "http://www.erros.com.br";

        $return["render"]["method"] = $this->Method;
        $return["render"]["data"] = $this->Data;
        $return["render"]["args"] = $this->Args;

        return $return;
    }
    

}