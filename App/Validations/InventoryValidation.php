<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class InventoryValidation
{

    public static function create()
    {
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên đơn hàng');
            $is_valid = false;
        }

        
        if (!isset($_POST['quantity']) || $_POST['quantity'] === '') {
            NotificationHelper::error('quantity', 'Không để trống số lượng ');
            $is_valid = false;
        }

        
        if (!isset($_POST['unit_price']) || $_POST['unit_price'] === '') {
            NotificationHelper::error('unit_price', 'Không để trống giá tiền ');
            $is_valid = false;
        }

        if (!isset($_POST['unit']) || $_POST['unit'] === '') {
            NotificationHelper::error('unit', 'Không để trống đơn vị tính');
            $is_valid = false;
        }

        // if (!isset($_POST['order_date']) || $_POST['order_date'] === '') {
        //     NotificationHelper::error('order_date', 'Không để trống ngày đặt hàng ');
        //     $is_valid = false;
        // }

        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        
        return $is_valid;
    }

    
}
