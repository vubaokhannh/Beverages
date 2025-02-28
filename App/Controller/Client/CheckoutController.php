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
use App\Models\Ingerdients;
use App\Models\Inventory;






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
            $check_materials = self::deductMaterials($cart_data, true);
            if (!$check_materials) {
                NotificationHelper::error('cart', 'Nguyên liệu không đủ, đặt hàng thất bại');
                header('location: /checkout');
                exit();
            }

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
                        self::deductMaterials($cart_data, false);
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

                        self::deductMaterials($cart_data, false);
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




    public static function deductMaterials($cart, $check_only = false)
    {
        $recipes = new Recipes();
        $ingredients = new Ingerdients();
        $inventory = new Inventory();
    
        foreach ($cart as $item) {
            $product_id = $item['product_id'];
            $product_quantity = $item['quantity'];
    
            $recipe_data = $recipes->findByProductId($product_id);
            if (isset($recipe_data['id'])) {
                $recipe_data = [$recipe_data];
            }
    
            foreach ($recipe_data as $recipe) {
                $ingredients_data = $ingredients->findByIngredientId((int) $recipe['id']);
                if (isset($ingredients_data['id'])) {
                    $ingredients_data = [$ingredients_data];
                }
    
                foreach ($ingredients_data as $ingredient) {
                    $required_quantity = $ingredient['quantity'] * $product_quantity;
                    $inventory_data = $inventory->findByMaterialId($ingredient['materials_id']);
    
                    if (isset($inventory_data['id'])) {
                        $inventory_data = [$inventory_data];
                    }
    
                    $total_available = array_sum(array_column($inventory_data, 'quantity'));
    
                    if ($total_available < $required_quantity) {
                        return false;
                    }
                }
    
                if ($check_only) {
                    continue;
                }
    
                foreach ($ingredients_data as $ingredient) {
                    $required_quantity = $ingredient['quantity'] * $product_quantity;
                    $inventory_data = $inventory->findByMaterialId($ingredient['materials_id']);
    
                    if (isset($inventory_data['id'])) {
                        $inventory_data = [$inventory_data];
                    }
    
                    foreach ($inventory_data as &$inventory_item) {
                        if ($inventory_item['quantity'] >= $required_quantity) {
                            $inventory_item['quantity'] -= $required_quantity;
                            $inventory->updateMaterialQuantity($inventory_item['id'], ['quantity' => $inventory_item['quantity']]);
                            break;
                        }
                    }
                }
            }
        }
        return true;
    }

    public function qr()
    {
        Qr::render();
    }
}
