<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Account\Index;
use App\View\Client\Page\Account\Order as OrderDetailHis;


use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;


const DONHANGCHOXYLY = '0';
const DONHANGDADAT = '1';
const DONHANGDAHUY = '2';




class AccountController
{

    public function index($id)
    {
        $model = new User();
        $user = $model->getOneUser($id);

        $order = new Order();
        $orders_0 = $order->getAllOrder_ByStatus($id, DONHANGCHOXYLY);
        $orders_1 = $order->getAllOrder_ByStatus($id, DONHANGDADAT);
        $orders_2 = $order->getAllOrder_ByStatus($id, DONHANGDAHUY);



        $data = [
            'users' => $user,
            'orders_0' => $orders_0,
            'orders_1' => $orders_1,
            'orders_2' => $orders_2,
        ];


        Header::render();
        Index::render($data);
        Footer::render();
    }


    public function order($id)
    {

        $model = new Order();
        $order = $model->getOneorder($id);

        $order_details = new OrderDetail();

        $order_details_data = $order_details->getAllOrderDetailByOrderId($order['id']);
        


        $data = [
            'order' => $order,
            'order_details' => $order_details_data,
        ];
        Header::render();
        OrderDetailHis::render($data);
        Footer::render();
    }
}
