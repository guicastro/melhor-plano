<?php

namespace Views;

class Html
{
    protected $Render;
    protected $Success;
    protected $ErrorHandling;

    public function __construct($success, $render, $error) {

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

            echo $this->Render;
        }
        else {

            header("Content-Type: application/json; charset=UTF-8");

            $error["success"] = false;
            $error["error"] = $this->ErrorHandling;
            echo json_encode($error);
        }
    }


}