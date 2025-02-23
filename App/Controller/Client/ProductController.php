<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Product\Index;
use App\View\Client\Page\Product\Detail;

use App\Models\Product;
use App\Models\Category;


class ProductController
{
    public function index()
    {
        $model = new Product();
        $products = $model->getAll();
        $model_category = new Category();
        $categories = $model_category->getAll();
        $data = [
            'products' => $products,
            'categories' => $categories,

        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }

    public function detail($id)
    {
        $model = new Product();
        $products = $model->getOneProduct($id);

        $model_category = new Category();
        $categories = $model_category->getAll();


        $data = [
            'products' => $products,
            'categories' => $categories,
        ];

        Header::render();
        Detail::render($data);
        Footer::render();
    }

    public static function getProductByCategory($id)
    {
        $product = new Product();
        $data_product = $product->getAllProductByCategoryAndStatus($id);

        $category = new Category();
        $data_category = $category->getAllCategoryByStatus();


        $data = [
            'products' => $data_product,
            'categories' => $data_category,
        ];
        // var_dump($data);
        Header::render();
        Index::render($data);
        Footer::render();
    }
}
