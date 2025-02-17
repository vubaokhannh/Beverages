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
            NotificationHelper::error('store_product', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
        $name = $_POST['name'];
       
        // Kiểm tra các tên có tồn tại hay chưa
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);

        if ($is_exist) {
            NotificationHelper::error('store_product2', 'Tên sản phẩm này đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }


        // Thêm vào
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'short_description' => $_POST['short_description'],
            'date' => $_POST['date'],
            'origin' => $_POST['origin'],
            'is_featured' => $_POST['is_featured'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];
        $is_upload = ProductValidation::updateImage();
        //  var_dump($is_upload);
        if ($is_upload) {
            $data['image'] = $is_upload;
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



    public function edit()
    {
        Header::render();
        Edit::render();
        Footer::render();
    }
}
