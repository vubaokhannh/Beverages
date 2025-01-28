<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Vourcher\Index;
use App\View\Admin\Page\Vourcher\Create;
use App\View\Admin\Page\Vourcher\Edit;



class VourcherController
{
    public function index()
    {
        Header::render();
        Index::render();
        Footer::render();
    }

    public function create()
    {
        Header::render();
        Create::render();
        Footer::render();
    }

    public function edit()
    {
        Header::render();
        Edit::render();
        Footer::render();
    }
}
