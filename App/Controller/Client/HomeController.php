<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;
use App\View\Client\Page\Home;


use App\Helpers\NotificationHelper;
use App\View\Client\Components\Notification;
use App\Models\Product;






class HomeController
{
    public function index()
    {
        $model = new Product();
        $products = $model->getAllByStatus();

        $data = [
            'products' => $products,

        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Home::render($data);
        Footer::render();
    }
}
