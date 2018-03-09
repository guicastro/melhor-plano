<?php

namespace Functions;

class ParseData
{
    protected $Method;
    protected $Data;

    public function __construct($method) {

        $this->setMethod($method);
    }

    protected function setMethod($method) {

        $this->Method = $method;
    }

    public function parseData() {

        switch ($this->Method) {

            case "GET":
                $this->Data = $_GET;
                break;
            case "POST":
                $this->Data = $_POST;
                break;
            case "PUT":
                $ParsePut = new ParsePut();
                $this->Data = $ParsePut->parsePut();
                break;
            case "DELETE":
                $this->Data = $_REQUEST;
                break;
            case "REQUEST":
                $this->Data = $_REQUEST;
            default:
                $this->Data = $_REQUEST;
                break;
        }

        return $this->Data;
    }
 
}