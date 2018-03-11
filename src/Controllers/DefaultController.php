<?php

namespace Controllers;

class DefaultController
{
    protected $Action;
    protected $ModelName;
    protected $Model;
    protected $View;
    protected $Method;
    protected $Args;

    public function __construct($model, $action, $view, $method, $args) {

        $this->setModel($model);
        $this->setAction($action);
        $this->setMethod($method);
        $this->setView($view);
        $this->setArgs($args);
        $this->runController();
    }

    protected function setModel($model) {

        $this->ModelName = $model;
    }

    protected function setAction($action) {

        $this->Action = $action;
    }

    protected function setView($view) {

        $this->View = ucfirst($view);
    }

    protected function setMethod($method) {

        $this->Method = $method;
    }

    protected function setArgs($args) {

        $this->Args = $args;
    }

    protected function runController() {
        
        $Model = "\\Models\\".$this->ModelName."Model";
        $Action = $this->Action;
        $this->Model = new $Model($this->Method, $this->Args);
        $RunAction = $this->Model->$Action();
                   
        $ViewName = "\\Views\\".$this->View;;
        $View = new $ViewName($RunAction['success'], $RunAction['render'], $RunAction['error']);
        $View->render();    
    }


}