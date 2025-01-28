<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Auth\Login;
class LoginController{
    public function index() {
        Header::render();
        Login::render();
        Footer::render();
    }
}