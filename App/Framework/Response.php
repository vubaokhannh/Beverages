<?php

namespace App\Framework;

class Response
{
    private string $body = "";

    public function setBody(string $body): void{
        $this->body = $body;
    }

    public function getBody(): string{
        return $this->body;
    }
}
