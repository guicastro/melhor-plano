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
                        
        $Database = $this->Database;
        
        foreach($Database->products as $key => $ProductObject) {

            $Products[$ProductObject->id] = $ProductObject;
        }
        
        $Bundles = $Database->bundles;
        
        foreach($Bundles as $keyBundle => $BundleObject) {
            
            $Bundles[$keyBundle]->mainProduct = $Products[$BundleObject->mainProduct];
            foreach($BundleObject->products as $keyProducts => $BundleProductObject) {
                
                $BundleProductObject->product = $Products[$BundleProductObject->product];
                $NewBundleProducts[] = $BundleProductObject;

                $Bundles[$keyBundle]->product = $NewBundleProducts;
            }
        }

        
        if( count($Database->products)>0 || count($Bundles)>0 ) {

            $return["success"] = true;
        }
        else {
            
            $return["success"] = false;
            $return["error"]["errorCode"] = 204;
            $return["error"]["type"] = "No Content";
            $return["error"]["developerMessage"] = "Não foram encontrados registros no banco de dados com os parâmetros informados";
            $return["error"]["userMessage"] = "Não há dados para a pesquisa informada";
        }


        $return["render"]["products"] = $Database->products;
        $return["render"]["bundles"] = $Bundles;

        return $return;
    }
    

}