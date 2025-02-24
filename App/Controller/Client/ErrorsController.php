<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Errors\Index;


class ErrorsController{
    public function index() {
        Index::render();
    }
}
