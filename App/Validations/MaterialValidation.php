<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class MaterialValidation
{

    public static function create()
    {
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên');
            $is_valid = false;
        }

        if (!isset($_POST['unit']) || $_POST['unit'] === '') {
            NotificationHelper::error('unit', 'Không để trống đơn vị tính');
            $is_valid = false;
        }

        if (!isset($_POST['created_at']) || $_POST['created_at'] === '') {
            NotificationHelper::error('created_at', 'Không để trống ngày tạo');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit()
    {
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên');
            $is_valid = false;
        }

        if (!isset($_POST['unit']) || $_POST['unit'] === '') {
            NotificationHelper::error('unit', 'Không để trống đơn vị tính');
            $is_valid = false;
        }

        if (!isset($_POST['created_at']) || $_POST['created_at'] === '') {
            NotificationHelper::error('created_at', 'Không để trống ngày tạo');
            $is_valid = false;
        }

        return $is_valid;
    }
}
