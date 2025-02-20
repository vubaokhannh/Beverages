<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\User\Index;
use App\View\Admin\Page\User\Create;
use App\View\Admin\Page\User\Edit;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;

use App\Validations\UserValidation;

use App\Models\User;

class UserController
{

    public function index()
    {

        $model = new User();
        $user = $model->getAll();

        $data = [
            'users' => $user,

        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    public function create()
    {

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render();
        Footer::render();
    }

    public static function store()
    {


        $is_valid = UserValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm khách hàng thất bại');
            header('location: /admin/users/create');
            exit;
        }
        $email = $_POST['email'];

        $user = new User();
        $is_exist = $user->getOneUserByEmail($email);

        if ($is_exist) {
            NotificationHelper::error('name_user', 'Email này đã tồn tại');
            header('location: /admin/users/create');
            exit;
        }

        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],
            'role' => $_POST['role'],
        ];
        $is_upload = UserValidation::updateImage();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }
        $result = $user->createUser($data);



        if ($result) {
            NotificationHelper::success('create_user', 'Thêm khách hàng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('create_user', 'Thêm khách hàng thất bại');
            header('location: /admin/users/create');
            exit;
        }
    }

    public function edit()
    {

        Header::render();
        Edit::render();
        Footer::render();
    }
}
