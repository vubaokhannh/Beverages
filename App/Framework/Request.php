<?php

namespace App\Framework;

class Request
{
    public function __construct(public string $method, 
                                public array $get,
                                public array $post,
                                public array $files,
                                public array $cookie,
                                public array $server) {}


    public static function createFromGlobal(){
        return new static(
            $_SERVER["REQUEST_METHOD"],
            $_GET,
            $_POST,
            $_FILES,
            $_COOKIE,
            $_SERVER
        );
    }
}
