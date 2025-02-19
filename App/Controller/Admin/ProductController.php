<?php

namespace App\Controller\Admin;


use App\View\Admin\Layouts\Header;
use App\View\Admin\Layouts\Footer;

use App\View\Admin\Page\Product\Index;
use App\View\Admin\Page\Product\Create;
use App\View\Admin\Page\Product\Edit;

use App\Helpers\NotificationHelper;
use App\View\Admin\Components\Notification;
use App\Validations\ProductValidation;



use App\Framework\Controller;

use App\Models\Product;
use App\Models\Category;





class ProductController extends Controller
{

    public function index()
    {
        $model = new Product();
        $products = $model->getAll();

        $data = [
            'products' => $products,

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

        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('createvalidation', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
        $name = $_POST['name'];

        $product = new Product();
        $is_exist = $product->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('name_product', 'Tên sản phẩm này đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }

        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'short_description' => $_POST['short_description'],
            'date' => $_POST['date'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];
        $is_upload = ProductValidation::updateImage();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }
        $result = $product->createProduct($data);



        if ($result) {
            NotificationHelper::success('create_product', 'Thêm sản phẩm thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('create_product', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
    }

    public static function edit(int $id)
    {

        $product = new product();
        $data_product = $product->getOneproduct($id);

        $category = new category();
        $data_category = $category->getAllCategory();
        if (!$data_product) {
            NotificationHelper::error('edit_product', 'Không thể xem sản phẩm này!');
            header('Location: /admin/products');
        }
        $data = [
            'products' => $data_product,
            'category' => $data_category,

        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }

    public static function update(int $id)
    {
        $is_valid = ProductValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update_product', 'Cập nhật sản phẩm thất bại  !');
            header("Location: /admin/products/$id");
            exit();
        }

        $name = $_POST['name'];
        $product = new product();
        $is_exist = $product->getOneproductByName($name);

        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update_product_name', 'Tên loại sản phẩm đã tồn tại!');
            header("Location: /admin/products/$id");
            exit();
        }

        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'short_description' => $_POST['short_description'],
            'date' => $_POST['date'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];

        $is_upload = ProductValidation::updateImage();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }
        $result = $product->updateProduct($id, $data);
        if ($result) {
            NotificationHelper::success('update_products', 'Cập nhật sản phẩm thành công!');
            header('Location: /admin/products');
        } else {
            NotificationHelper::error('update_products', 'Cập nhật sản phẩm thất bại!');
            header("Location: /admin/products/$id");
        }
    }

    public static function delete(int $id)
    {

        $product = new Product();
        $return = $product->deleteProduct($id);
        if (!$return) {
            NotificationHelper::error('delete_product', 'Xóa sản phẩm thất bại!');
            header('Location: /admin/products');
        } else {
            NotificationHelper::success('delete_product', 'Xóa sản phẩm thành công!');
            header('Location: /admin/products');
        }
    }

    public function searchProduct()
    {

        $keyword = $_GET['keywords'] ?? '';
        $keyword = trim($keyword);

        if (empty($keyword)) {
            $_SESSION['keywords'] = null;

            $data = [];
            Header::render();
            Index::render($data);
            Footer::render();
            return;
        }
        $_SESSION['keywords'] = $keyword;
        $product = new Product();
        $products = $product->search($keyword);
       
        $data = [
            'products' => $products,

        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }
}
