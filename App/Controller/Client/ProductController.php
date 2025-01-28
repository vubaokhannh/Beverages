<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Product\Index;
use App\View\Client\Page\Product\Detail;

class ProductController
{
    public function index()
    {
        Header::render();
        Index::render();
        Footer::render();
    }

    public function detail()
    {
        Header::render();
        Detail::render();
        Footer::render();
    }
}
