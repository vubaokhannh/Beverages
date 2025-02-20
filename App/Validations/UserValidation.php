<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{

    public static function create()
    {
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên ');
            $is_valid = false;
        }

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống Email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        } else {
            if (strlen($_POST['password'] < 3)) {
                NotificationHelper::error('password', 'Mật khẩu phải có ít nhất 3 ký tự');
                $is_valid = false;
            }
        }


        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống nhập lại mật khẩu');
            $is_valid = false;
        } else {
            if ($_POST['re_password'] != $_POST['password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại không trùng với mật khẩu đã nhập');
                $is_valid = false;
            }
        }

        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        if (!isset($_POST['role']) || $_POST['role'] === '') {
            NotificationHelper::error('role', 'Không để trống quyền');

            $is_valid = false;
        }
        return $is_valid;
    }

    public static function edit()
    {
        $is_valid = true;
        // Tên đăng nhập
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên');
            $is_valid = false;
        }

        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Không để trống giá tiền');
            $is_valid = false;
        } else if ((int) $_POST['price'] <= 0) {
            NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
            $is_valid = false;
        }

        // Giá giảm
        if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
            NotificationHelper::error('discount_price', 'Không để trống giá giảm');
            $is_valid = false;
        } else if ((int) $_POST['discount_price'] < 0) {
            NotificationHelper::error('discount_price', 'Giá giảm phải lớn hơn 0');
            $is_valid = false;
        } else if ((int) $_POST['discount_price'] > (int) $_POST['price']) {
            NotificationHelper::error('discount_price', 'Giá giảm phải nhỏ hơn giá tiền');
            $is_valid = false;
        }

        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id_Product', 'Loại sản phẩm không được để trống!');
            $is_valid = false;
        }

        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function updateImage()
    {
        if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            return false;
        }
        // nowi luu file ảnh
        $target_dir = 'public/uploads/users/';
        // kiểm tra loại file có hợp lệ ko
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' &&  $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ chấp nhận file ảnh JPG, JPEG, PNG, GIF');
            return false;
        }
        // tháy đổi tên file mà mình mông muốn 
        $nameImage = date('YmdHmi') . '.' . $imageFileType;
        // đường dẫn đầy đủ file 
        $target_file = $target_dir . $nameImage;
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào trong thư mục lưu trữ ');
            return false;
        }
        return $nameImage;
    }
}
