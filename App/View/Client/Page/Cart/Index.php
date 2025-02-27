<?php

namespace App\View\Client\Page\Cart;

use App\View\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>
                                Giỏ hàng</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>
                                    Giỏ hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_price = 0;
                                    foreach ($data as $cart):
                                        if ($cart['data']):
                                            $unit_price = $cart['data']['price'];
                                            $subtotal = $unit_price * $cart['quantity'];
                                            $total_price += $subtotal;
                                    ?>
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img src="/public/uploads/products/<?= $cart['data']['img'] ?>" alt="" width="70px">
                                                    <h5><?= $cart['data']['name'] ?></h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    <?= number_format($unit_price) ?> VNĐ
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <div class="quantity-control">
                                                                <input type="number" name="quantity" value="<?= $cart['quantity'] ?>" data-id="<?= $cart['data']['id'] ?>" data-price="<?= $unit_price ?>" onchange="manualUpdateQuantity(this)" min="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    <span class="subtotal"><?= number_format($subtotal) ?></span> VNĐ
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <form action="cart/delete" method="post">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <input type="hidden" name="id" value="<?= $cart['data']['id'] ?>">
                                                        <button type="submit" class="icon_close border-0"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="/" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>
                                    Mã giảm giá</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">ÁP DỤNG </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Tổng số </h5>
                            <ul>

                                <li>Tổng <span><?= number_format($total_price) ?> VNĐ</span></li>
                            </ul>
                            <a href="/checkout" class="primary-btn">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       


<?php

    }
}

?>