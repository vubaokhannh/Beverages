<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Order\Index;
class OrderController{

    public function index() {
        Header::render();
        Index::render();
        Footer::render();
    }

}