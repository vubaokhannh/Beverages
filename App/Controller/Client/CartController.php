<?php

namespace App\Controller\Client;

use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Cart\Index;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\View\Client\Components\Notification;

class CartController{

    // public function index() {
    //     Header::render();
    //     Index::render();
    //     Footer::render();
    // }

    public static function index()
    {

        if (isset($_COOKIE['cart'])) {
            $product = new Product();

            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);

            if (count($cart_data)) {
                foreach ($cart_data as $key => $value) {
                    $product_id = $value['product_id'];
                    // var_dump($product_id);
                    $result = $product->getOneProduct($product_id);
                    // var_dump($result);
                    $cart_data[$key]['data'] = $result;

                    // var_dump($cart_data);
                }

                // echo "<pre>"; 
                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Index::render($cart_data);
                Footer::render();
            } else {

                NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');

                header('location: /products');
            }
        } else {
            // $_SESSION['error'] = 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào';
            NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');

            header('location: /products');

        }
    }
    public static function add()
    {
        ob_start();
        $product = new Product();

        $product_id = $_POST['id'];

        if (isset($_COOKIE['cart'])) {
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = [];
        }

        $product_id_arr = array_column($cart_data, 'product_id');

        if (in_array($product_id, $product_id_arr)) {
            foreach ($cart_data as $key => $value) {
                if ($cart_data[$key]['product_id'] == $product_id) {
                    $cart_data[$key]['quantity'] += 1;
                }
            }
        } else {
            $product_array = [
                'product_id' => $product_id,
                'quantity' => 1,
            ];
            $cart_data[] = $product_array;
        }

        $product_data = json_encode($cart_data);
        setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

        NotificationHelper::success('cart', 'Đã thêm sản phẩm vào giỏ hàng');


        header('location: /cart');
        ob_end_flush();
    }

    public static function update()
    {
        $product_id = $_POST['id'];
        $quantity = $_POST['quantity'];

        if (isset($_COOKIE['cart'])) {

            $cookie_data = $_COOKIE['cart'];

            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
        $product_id_arr = array_column($cart_data, 'product_id');

        // kiểm tra product_id có tồn tại trong cookie cart chưa 
        if (in_array($product_id, $product_id_arr)) {
            foreach ($cart_data as $key => $value) {
                // nếu có thì cập nhật số lượng = số lượng mà ng dùng submit
                if ($cart_data[$key]['product_id'] == $product_id) {
                    $cart_data[$key]['quantity'] = $quantity;
                }
            }
        } else {
            // nếu chưa có thì thêm vào cookie cart 
            $product_array = array(
                'product_id' => $product_id,
                'quantity' => 1,
            );
            $cart_data[] = $product_array;
        }

        // chuyển array thành string để lưu vào cookie cart 
        $product_data = json_encode($cart_data);

        // lưu cookie 
        setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

        NotificationHelper::success('cart', 'Đã cập nhật số lượng sản phẩm');

        // sau khi lưu cookie thì phải chuyển trang/ load lại thì mới ăn cookie
        header('location: /cart');
    }
    public static function deleteItem()
    {
        if (isset($_COOKIE['cart'])) {
            $cookie_data = $_COOKIE['cart'];
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $key => $value) {
                if ($cart_data[$key]['product_id'] == $_POST['id']) {
                    unset($cart_data[$key]);
                    $product_data = json_encode($cart_data);

                    setcookie("cart", $product_data, time() + 3600 * 24 * 30 * 12, '/');
                }
            }
            NotificationHelper::success('cart', 'Đã xoá sản phẩm khỏi giỏ hàng');

            header('location: /cart');
        }
    }
    // public static function deleteAll()
    // {
    //     if (isset($_COOKIE['cart'])) {
    //         setcookie("cart", "", time() - 3600 * 24 * 30 * 12, '/');
    //     }
    //     NotificationHelper::success('cart', 'Đã xoá giỏ hàng');

    //     header('location: /products');
    // }

   
}