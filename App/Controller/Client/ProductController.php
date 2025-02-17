<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Product\Index;
use App\View\Client\Page\Product\Detail;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $model = new Product();
        $products = $model->getAll();

        $data = [
            'products' => $products,

        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }

    public function detail($id)
    {
        $model = new Product();
        $products = $model->getOneProduct($id);

        $data = [
            'products' => $products,
        ];

        Header::render();
        Detail::render( $data);
        Footer::render();
    }
}
