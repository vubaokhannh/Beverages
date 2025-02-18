<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;


use App\Helpers\NotificationHelper;
use App\View\Client\Components\Notification;
use App\Validations\AuthValidation;

use App\View\Client\Page\Auth\Register;

use App\Models\User;

class RegisterController
{

    public function register()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Register::render();
        Footer::render();
    }

    public static function registerAction()
    {
        $is_valid = AuthValidation::register();
        if (!$is_valid) {
            NotificationHelper::error('register_validation', 'Đăng ký thất bại');
            header('Location: /register');
            exit();
        }
        $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data = [
            'name' => $_POST['name'],
            'password' => $hash_password,
            'email' => $_POST['email'],

        ];

        $user = new User();
        $result = $user->createUser($data);
      
        if ($result) {
            NotificationHelper::success('register_suss', 'Đăng ký thành công');
            header('Location: /login');
        } else {
            NotificationHelper::error('register_fall', 'Đăng ký thất bại');
            header('location: /register');
            exit;
        }
    }
}
