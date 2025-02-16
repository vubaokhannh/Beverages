<?php


namespace App\Controller\Admin;

use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;


use App\View\Admin\Page\Home;





class DashboardController {

    public function index() {
        Header::render();
        Home::render();
        Footer::render();
    }
}