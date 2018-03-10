<?php

namespace Models;

use \Functions;
use \Services;

class BroadbandModel {

    protected $Method;
    protected $Args;
    protected $Data;
    protected $Database;

    public function __construct($method, $args) {

        $this->setMethod($method);
        $this->setArgs($args);
        $this->setData();
        $this->setDatabase();
    }

    protected function setMethod($method) {

        $this->Method = $method;
    }

    protected function setArgs($args) {

        $this->Args = $args;
    }

    protected function setData() {

        $ParseData = new Functions\ParseData($this->Method);
        $this->Data = $ParseData->parseData();
    }

    protected function setDatabase() {

        $Database = new \Services\Database;
        $this->Database = $Database->render();
    }

    public function ListAll() {
                
        // $return["error"]["errorCode"] = 400;
        // $return["error"]["type"] = "ErrorType";
        // $return["error"]["developerMessage"] = "Erro no controller";
        // $return["error"]["userMessage"] = "Erro geral";
        // $return["error"]["moreInfo"] = "http://www.erros.com.br";
        
        // $return["render"]["method"] = $this->Method;
        // $return["render"]["data"] = $this->Data;
        // $return["render"]["args"] = $this->Args;
        
        // $return["render"]["database"] = $this->Database;
        
        $Database = $this->Database;

        foreach($Database["addons"] as $type => $DataArray) {

            foreach($DataArray as $key => $idAddon) {
                
                $Addon[$type][$idAddon] = $Database["products"][$idAddon];
            }
        }

        
        foreach($Database["bundles"] as $idProduct => $DataArray) {
            
            $Bundles[$idProduct]["product"] = $Database["products"][$idProduct];

            foreach($DataArray as $idSubProduct => $bundleTax) {
                
                if($Database["products"][$idSubProduct]["type"]<>"addon") {

                    $Bundles[$idProduct][$Database["products"][$idSubProduct]["type"]][$idSubProduct] = $Database["products"][$idSubProduct];
                    $Bundles[$idProduct][$Database["products"][$idSubProduct]["type"]][$idSubProduct]["tax"] = $bundleTax;
                    $Bundles[$idProduct][$Database["products"][$idSubProduct]["type"]][$idSubProduct]["addon"] = $Addon[$Database["products"][$idSubProduct]["type"]];
                }
                // $Bundles[$idProduct][$idSubProduct]["tax"] = $bundleTax;

                switch ($Database["products"][$idSubProduct]["type"]) {

                    case "bb":
                        // $Bundles[$idProduct][$idSubProduct]["bb"] = $Database["products"][$idSubProduct];
                    case "tv":
                        // $Bundles[$idProduct][$idSubProduct]["tv"] = $Database["products"][$idSubProduct];
                    case "ll":
                        // $Bundles[$idProduct][$idSubProduct]["ll"] = $Database["products"][$idSubProduct];

                }
            }
        }
        $return["success"] = true;

        $return["render"]["products"] = $Database["products"];
        $return["render"]["bundles"] = $Bundles;

        return $return;
    }
    

}