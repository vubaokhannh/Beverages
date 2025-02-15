<?php


namespace App\Controller\Admin;

use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;


use App\View\Admin\Page\Home;

use App\Framework\Controller;



class DashboardController extends Controller{

    public function index() {
        Header::render();
        Home::render();
        Footer::render();
    }
}