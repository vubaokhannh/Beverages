<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Cart\Checkout;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;


use App\View\Client\Components\Notification;

use App\Helpers\AuthHelper;
use App\Validations\CheckoutValidation;

use App\Controller\Client\OrderController;

class CheckoutController
{


    public static function checkout()
    {
        $is_login = AuthHelper::checkLogin();
        if (isset($_COOKIE['cart']) && $is_login) {

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
                }
                $data = [
                    'cart_data' => $cart_data,

                ];
                Header::render();
                Notification::render();
                NotificationHelper::unset();
                Checkout::render($data);
                Footer::render();
            } else {
                NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');

                header('location: /products');
            }
        } else {
            NotificationHelper::error('checkout', 'Vui lòng đăng nhập hoặc thêm sản phẩm vào giỏ hàng để thanh toán');
            header('location: /login');
        }
    }


    public static function getorder()
    {
        if (!isset($_COOKIE['cart'])) {
            NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
            header('location: /');
            exit();
        }
    
        $product = new Product();
        $cookie_data = $_COOKIE['cart'];
        $cart_data = json_decode($cookie_data, true);
    
        if (empty($cart_data)) {
            NotificationHelper::error('cart', 'Giỏ hàng trống. Vui lòng thêm sản phẩm vào');
            header('location: /');
            exit();
        }
    
        foreach ($cart_data as $key => $value) {
            $product_id = $value['product_id'];
            $result = $product->getOneProduct($product_id);
    
            if (!$result) {
                NotificationHelper::error('cart', 'Sản phẩm không tồn tại!');
                header('location: /cart');
                exit();
            }
    
            $cart_data[$key]['data'] = $result;
        }
    
        return $cart_data;
    }
    
    public static function order()
    {
        $is_login = AuthHelper::checkLogin();
        if ($is_login) {
            $is_valid = CheckoutValidation::createOrder();
            if (!$is_valid) {
                NotificationHelper::error('createOrder', 'Đặt hàng thất bại');
                header("Location: /checkout");
                exit();
            }

            $cart_data = self::getorder();

            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'email' =>  $_POST['email'],
                'total' => $_POST['total'],
                'payment_method_id' => $_POST['payment_method'],
                'user_id' =>  $_SESSION['user']['id'],
            ];

            if ($_POST['payment_method'] === '0') {
               
                $order = new Order;
                $order_id = $order->createOder($data);

                if ($order_id) {
                    foreach ($cart_data as $item) {
                        $orderDetailData = [
                            'order_id' => $order_id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['data']['price'],
                        ];

                        $orderDetail = new OrderDetail;
                        $orderDetailData =  $orderDetail->createorderDetail($orderDetailData);
                    }
                }

                setcookie('cart', '', time() - (3600 * 24 * 30 * 12), '/');
                NotificationHelper::success('cart', 'Đặt hàng thành công');
                header('location: /');
                exit();
            } else($_POST['payment_method'] === '1');
   
        } else {
            NotificationHelper::error('cart', 'Vui lòng đăng nhập để thực hiện chức năng này');
            header('location: /');
        }
    }
}
