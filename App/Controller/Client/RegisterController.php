<?php 

namespace App\Controller\Client;
use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Auth\Register;
class RegisterController{
    public function index() {
        Header::render();
        Register::render();
        Footer::render();
    }
}