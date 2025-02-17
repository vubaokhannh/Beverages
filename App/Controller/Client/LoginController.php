<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Auth\Login;


use App\Helpers\NotificationHelper;
use App\View\Client\Components\Notification;

use App\Validations\AuthValidation;
use App\Helpers\AuthHelper;

class LoginController
{
    public function Login()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }



    public static function loginAction()
    {

        $is_valid = AuthValidation::login();
        if (!$is_valid) {
            NotificationHelper::error('login_validdation', 'Đăng nhập thất bại');
            header('Location: /login');
            exit();
        }
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        ];

        $result = AuthHelper::login( $data);
        if ($result) {
         
            header('Location: /');
        } else {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
        }
    }
}
