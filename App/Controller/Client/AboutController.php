<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\About\Index;


class AboutController{
    public function index() {
        Header::render();
        Index::render();
        Footer::render();
    }
}
