<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;
use App\View\Client\Page\Home;


use App\Framework\Controller;




class HomeController  extends Controller{
    public function index() {
        Header::render();
        Home::render();
        Footer::render();
    }
}