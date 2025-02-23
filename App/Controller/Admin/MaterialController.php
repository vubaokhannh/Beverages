<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Material\Index;
use App\View\Admin\Page\Material\Create;
use App\View\Admin\Page\Material\Edit;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;

use App\Validations\MaterialValidation;


use App\Models\Material;



class MaterialController
{

    public function index()
    {

        $model = new Material();
        $material = $model->getAll();

        $data = [
            'material' => $material,

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

        $is_valid = MaterialValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm nguyên liệu thất bại');
            header('location: /admin/materials/create');
            exit;
        }
        $name = $_POST['name'];

        $material = new Material();
        $is_exist = $material->getOneMaterialByName($name);

        if ($is_exist) {
            NotificationHelper::error('name_material', 'Tên nguyên liệu này đã tồn tại');
            header('location: /admin/materials/create');
            exit;
        }

        $data = [
            'name' => $name,
            'unit' => $_POST['unit'],
            'created_at' => $_POST['created_at'],
        ];

        $result = $material->createMaterial($data);

        if ($result) {
            NotificationHelper::success('create_category', 'Thêm nguyên liệu thành công');
            header('location:  /admin/materials');
        } else {
            NotificationHelper::error('create_category', 'Thêm nguyên liệu thất bại');
            header('location:/admin/materials/create');
            exit;
        }
    }

    public function edit($id)
    {
        $model = new Material();
        $material = $model->getOne($id);
        $data = [
            'material' => $material,
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }

    public static function update($id)
    {


        $is_valid = MaterialValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update_material', 'Cập nhật sản phẩm thất bại  !');
            header("Location: /admin/materials/$id");
            exit();
        }

        $name = $_POST['name'];
        $material = new Material();
        $is_exist = $material->getOneMaterialByName($name);

        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update_material_name', 'Tên nguyên liệu đã tồn tại!');
            header("Location: /admin/materials/$id");
            exit();
        }

        $data = [
            'name' => $name,
            'unit' => $_POST['unit'],
            'created_at' => $_POST['created_at'],
        ];

        $result = $material->updateMaterial($id, $data);
        if ($result) {
            NotificationHelper::success('update_material', 'Cập nhật nguyên liệu thành công!');
            header('Location: /admin/materials');
        } else {
            NotificationHelper::error('update_material', 'Cập nhật nguyên liệu thất bại!');
            header("Location: /admin/materials/$id");
        }
    }

    public static function delete($id)
    {
        $material = new Material();
        $result = $material->deleteMaterial($id);
        if ($result) {
            NotificationHelper::success('delete_material', 'Xóa loại sản phẩm thành công!');
            header('Location: /admin/materials');
        } else {
            NotificationHelper::error('delete_material', 'Xóa loại sản phẩm thất bại!');
            header('location: /admin/materials');
        }
    }
}
