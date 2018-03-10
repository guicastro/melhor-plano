<?php

namespace Views;

class Json
{
    protected $Render;
    protected $Success;
    protected $ErrorHandling;

    public function __construct($success, $render, $error) {

        header("Content-Type: application/json; charset=UTF-8");

        $this->setSuccess($success);
        $this->setError($error);
        $this->setRender($render);
    }
    
    protected function setSuccess($success) {
        
        $this->Success = $success;
    }
    
    protected function setError($error) {
        
        $errorHandling["code"] = $error["errorCode"];
        $errorHandling["type"] = $error["type"];
        $errorHandling["developerMessage"] = $error["developerMessage"];
        $errorHandling["userMessage"] = $error["userMessage"];
        $errorHandling["moreInfo"] = $error["moreInfo"];
        $this->ErrorHandling = $errorHandling;
    }

    protected function setRender($render) {

        $this->Render = $render;
    }
    
    public function render() {

        if($this->Success==true) {

            $render["success"] = true;
            $render["data"] = $this->Render;
            echo json_encode($render);
        }
        else {

            $error["success"] = false;
            $error["error"] = $this->ErrorHandling;
            echo json_encode($error);
        }
    }


}