<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\User\Index;
use App\View\Admin\Page\User\Create;
use App\View\Admin\Page\User\Edit;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;

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
        Create::render();
        Footer::render();
    }

    public function edit()
    {

        Header::render();
        Edit::render();
        Footer::render();
    }
}
