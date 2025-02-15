<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Product\Index;
use App\View\Admin\Page\Product\Create;
use App\View\Admin\Page\Product\Edit;

use App\Framework\Controller;

use App\Model\Product;




class ProductController extends Controller
{

    public function index()
    {
        $model = new Product();
        $products = $model->findAll();

        $data = [
            'products' => $products,
         
        ];
    
        Header::render();
        Index::render($data);
        Footer::render();
    }

    public function create(){
        Header::render();
        Create::render();
        Footer::render();
    }

    public function store(){
        
    }

    public function edit(){
        Header::render();
        Edit::render();
        Footer::render();
    }


}
