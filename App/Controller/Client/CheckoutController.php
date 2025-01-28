<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Cart\Checkout;
class CheckoutController{

    public function index() {
        Header::render();
        Checkout::render();
        Footer::render();
    }
}