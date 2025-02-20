<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Order\Index;

use App\Models\Order;

class OrderController
{

    public function index()
    {

        $model = new Order();
        $order = $model->getAll();

        $data = [
            'order' => $order,

        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }
}
