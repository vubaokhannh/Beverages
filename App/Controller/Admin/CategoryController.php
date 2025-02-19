<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Category\Index;
use App\View\Admin\Page\Category\Create;
use App\View\Admin\Page\Category\Edit;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;

use App\Validations\CategoryValidation;


use App\Models\Category;



class CategoryController
{

    public function index()
    {

        $model = new Category();
        $category = $model->getAll();

        $data = [
            'category' => $category,

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

        $is_valid = CategoryValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm sản phẩm thất bại');
            header('location: /admin/categories/create');
            exit;
        }
        $name = $_POST['name'];

        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);

        if ($is_exist) {
            NotificationHelper::error('name_product', 'Tên loại sản phẩm này đã tồn tại');
            header('location: /admin/categories/create');
            exit;
        }

        $data = [
            'name' => $name,
            'description' => $_POST['description'],
            'status' => $_POST['status'],

        ];

        $result = $category->createCategory($data);

        if ($result) {
            NotificationHelper::success('create_category', 'Thêm loại sản phẩm thành công');
            header('location: /admin/categories');
        } else {
            NotificationHelper::error('create_category', 'Thêm loại sản phẩm thất bại');
            header('location:/admin/categories/create');
            exit;
        }
    }

    public function edit($id)
    {
        $model = new Category();
        $category = $model->getOne($id);
        $data = [
            'category' => $category,
        ];


        Header::render();
        Edit::render($data);
        Footer::render();
    }

    public static function update($id)
    {


        $is_valid = CategoryValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update_category', 'Cập nhật sản phẩm thất bại  !');
            header("Location: /admin/categories/$id");
            exit();
        }

        $name = $_POST['name'];
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);

        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update_category_name', 'Tên loại sản phẩm đã tồn tại!');
            header("Location: /admin/categories/$id");
            exit();
        }

        $data = [
            'name' => $name,
            'description' => $_POST['description'],
            'status' => $_POST['status'],

        ];


        $result = $category->updateCategory($id, $data);
        if ($result) {
            NotificationHelper::success('update_category', 'Cập nhật loại sản phẩm thành công!');
            header('Location: /admin/categories');
        } else {
            NotificationHelper::error('update_category', 'Cập nhật loại sản phẩm thất bại!');
            header("Location: /admin/categories/$id");
        }
    }

    public static function delete($id)
    {
        $category = new Category();
        $result = $category->deleteCategory($id);
        if ($result) {
            NotificationHelper::success('delete_category', 'Xóa loại sản phẩm thành công!');
            header('Location: /admin/categories');
        } else {
            NotificationHelper::error('delete_category', 'Xóa loại sản phẩm thất bại!');
            header('location: /admin/categories');
        }
    }
}
