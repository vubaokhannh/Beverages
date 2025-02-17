<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;
use App\View\Client\Page\Home;

use App\Models\Product;






class HomeController  {
    public function index() {
        $model = new Product();
        $products = $model->getAll();

        $data = [
            'products' => $products,

        ];
        Header::render();
        Home::render($data);
        Footer::render();
    }
}