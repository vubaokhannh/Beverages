<?php

namespace App\Controller\Client;


use App\View\Client\Layouts\Footer;
use App\View\Client\Layouts\Header;

use App\View\Client\Page\Cart\Checkout;
use App\View\Client\Page\Cart\Qr;



use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Recipes;




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
                // 'province' => $_POST['province'],
                // 'district' => $_POST['district'],
                // 'ward' => $_POST['ward'],
                'payment_method_id' => $_POST['payment_method'],
                'user_id' =>  $_SESSION['user']['id'],
            ];

            if ($_POST['payment_method'] === '0') {
                $order = new Order;
                $order_data = $order->createorder($data);
                $order_id = $order->getMaxId();

                if ($order_data) {
                    foreach ($cart_data as $item) {
                        $orderDetailData = [
                            'order_id' => $order_id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['data']['price'],
                        ];

                        $orderDetail = new OrderDetail;
                        $orderDetailData =  $orderDetail->create($orderDetailData);
                        self::deductMaterials($cart_data);
                    }
                }
                setcookie('cart', '', time() - (3600 * 24 * 30 * 12), '/');
                NotificationHelper::success('cart', 'Đặt hàng thành công');
                header('location: /');
                exit();
            }
            if ($_POST['payment_method'] === '1') {
                $_SESSION['qr'] = "https://api.vietqr.io/image/970403-070143043221-fmpz3mv.jpg?accountName=VU%20BAO%20KHANH&amount=" . $data['total'];
                $order = new Order;
                $order_data = $order->createorder($data);
                $order_id = $order->getMaxId();
                if ($order_data) {
                    foreach ($cart_data as $item) {
                        $orderDetailData = [
                            'order_id' => $order_id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['data']['price'],
                        ];

                        $orderDetail = new OrderDetail;
                        $orderDetailData =  $orderDetail->create($orderDetailData);

                        self::deductMaterials($item['product_id'], $item['quantity']);
                    }
                }
                setcookie('cart', '', time() - (3600 * 24 * 30 * 12), '/');
                NotificationHelper::success('cart', 'Đặt hàng thành công');
                header('location: /qr');
                exit();
            }
        } else {
            NotificationHelper::error('cart', 'Vui lòng đăng nhập để thực hiện chức năng này');
            header('location: /');
        }
    }


    public function qr()
    {
        Qr::render();
    }

    private static function deductMaterials($cart)
    {
        $results = [];

        foreach ($cart as $item) {
            $results[] = [  // Thêm vào mảng thay vì ghi đè
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ];
        }

        // var_dump($results);  // In ra danh sách đầy đủ

        $recipes = new Recipes();

        foreach ($results as $result) {
            $recipe_data = $recipes->findByProductId($result['product_id']);
            var_dump($recipe_data); // Debug từng sản phẩm
        }

        die;
    }
}
