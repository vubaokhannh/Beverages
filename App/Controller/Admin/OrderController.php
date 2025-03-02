<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Order\Index;
use App\View\Admin\Page\Order\Transport;
use App\View\Admin\Page\Order\Success;



use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;
use App\Models\Order;

class OrderController
{

    public function index()
    {

        $model = new Order();
        $order = $model->getAllOrderByStatus(0);

        $data = [
            'order' => $order,

        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }

    public function identify()
    {
        $id = $_POST['id'];

        $model = new Order();

        $data = [
            'status' => '1',

        ];

        $order = $model->updateorder($id, $data);

        if ($order) {
            NotificationHelper::success('identify', 'Xác nhận thành công, đơn hàng sẽ được giao');
            header('location: /admin/orders');
        } else {
            NotificationHelper::error('identify', 'Xác nhận thất bại');
            header('location: /admin/orders');
        }
    }

    public function transport()
    {

        $model = new Order();
        $order = $model->getAllOrderByStatus(1);

        $data = [
            'order' => $order,

        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Transport::render($data);
        Footer::render();
    }

    public function transportAction()
    {
        $id = $_POST['id'];

        $model = new Order();

        $data = [
            'status' => '2',

        ];

        $order = $model->updateorder($id, $data);

        if ($order) {
            NotificationHelper::success('identify', 'Xác nhận thành công, đơn hàng sẽ được giao');
            header('location: /admin/orders');
        } else {
            NotificationHelper::error('identify', 'Xác nhận thất bại');
            header('location: /admin/orders');
        }
    }

    public function success()
    {

        $model = new Order();
        $order = $model->getAllOrderByStatus(2);

        $data = [
            'order' => $order,

        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Success::render($data);
        Footer::render();
    }
}
