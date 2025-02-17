<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{

    public static function create()
    {
        $is_valid = true;
        // Tên đăng nhập
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên');
            $is_valid = false;
        }

        // giá tiền
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

        // Loại sản phẩm
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id_Product', 'Loại sản phẩm không được để trống!');
            $is_valid = false;
        }

        // Nổi bật
        if (!isset($_POST['is_featured']) || $_POST['is_featured'] === '') {
            NotificationHelper::error('is_featured', 'Không để trống nổi bật');
            $is_valid = false;
        }

        // Mật khẩu
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            // var_dump($_POST['status']);
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

        // giá tiền
        // if (!isset($_POST['price']) || $_POST['price'] === '') {
        //     NotificationHelper::error('price', 'Không để trống giá tiền');
        //     $is_valid = false;
        // } else if ((int) $_POST['price'] <= 0) {
        //     NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
        //     $is_valid = false;
        // }

        // // Giá giảm
        // if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
        //     NotificationHelper::error('discount_price', 'Không để trống giá giảm');
        //     $is_valid = false;
        // } else if ((int) $_POST['discount_price'] < 0) {
        //     NotificationHelper::error('discount_price', 'Giá giảm phải lớn hơn 0');
        //     $is_valid = false;
        // } else if ((int) $_POST['discount_price'] > (int) $_POST['price']) {
        //     NotificationHelper::error('discount_price', 'Giá giảm phải nhỏ hơn giá tiền');
        //     $is_valid = false;
        // }
        // Loại sản phẩm
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id_Product', 'Loại sản phẩm không được để trống!');
            $is_valid = false;
        }

        // Nổi bật
        if (!isset($_POST['is_featured']) || $_POST['is_featured'] === '') {
            NotificationHelper::error('is_featured', 'Không để trống nổi bật');
            $is_valid = false;
        }

        // Mật khẩu
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            // var_dump($_POST['status']);
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function updateImage()
    {
        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            return false;
        }
        // nowi luu file ảnh
        $target_dir = 'public/uploads/products/';
        // kiểm tra loại file có hợp lệ ko
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' &&  $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ chấp nhận file ảnh JPG, JPEG, PNG, GIF');
            return false;
        }
        // tháy đổi tên file mà mình mông muốn 
        $nameImage = date('YmdHmi') . '.' . $imageFileType;
        // đường dẫn đầy đủ file 
        $target_file = $target_dir . $nameImage;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào trong thư mục lưu trữ ');
            return false;
        }
        return $nameImage;
    }
   
}
