<?php


namespace App\Framework;

use App\Framework\Request;

abstract class Controller{
    protected Request $request;
    protected Response $response;

    public function setRequest(Request $request){
        $this->request = $request;
    }

    public function setResponse(Response $response){
        $this->response = $response;
    }
}