<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CheckoutValidation
{
   
    public static function createOrder(): bool
    {

        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }

        if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Không để trống số điện thoại');
            $is_valid = false;
        }
        
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        }
        
        if (!isset($_POST['address']) || $_POST['address'] === '') {
            NotificationHelper::error('address', 'Không để trống địa chỉ');
            $is_valid = false;
        }

        if (!isset($_POST['payment_method']) || $_POST['payment_method'] === '') {
            NotificationHelper::error('payment_method', 'Không để trống phương thức thanh toán');
            $is_valid = false;
        }
        return $is_valid;
    }
}