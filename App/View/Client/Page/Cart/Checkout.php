<?php

namespace App\View\Client\Page\Cart;

use App\View\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
?>

        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Thanh toán</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Thanh toán</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><span class="icon_tag_alt"></span>Có phiếu giảm giá? <a href="#">bấm vào đây</a> để nhập mã của bạn
                        </h6>
                    </div>
                </div>
                <div class="checkout__form">
                    <h4>Chi tiết thanh toán</h4>
                    <form action="/order" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Họ và Tên<span>*</span></p>
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add" name="email">

                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <textarea name="address" type="text" class="form-control" placeholder="Địa chỉ" cols="10" rows="5"></textarea>
                                </div>
                                <div class="checkout__input ">
                                    <p>Phương thức thanh toán<span>*</span></p>
                                    <select id="payment_method" name="payment_method" class="">

                                        <option value="0">COD </option>
                                        <option value="1">VNPAY</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="checkout__order">
                                    <h4>Your Order</h4>
                                    <div class="checkout__order__products">Sản phảm <span>Tổng</span></div>
                                    <ul>
                                        <?php
                                        $total_price = 0;
                                        foreach ($data['cart_data'] as $cart):
                                            $unit_price = $cart['quantity'] * $cart['data']['price'];
                                            $total_price += $unit_price;
                                        ?>
                                            <li><?= $cart['data']['name'] ?><span><?= number_format($unit_price) ?> VNĐ</span></li>
                                         
                                        <?php
                                        endforeach;
                                        ?>

                                    </ul>
                                    <div class="checkout__order__subtotal">Phí vận chuyển <span>0 VNĐ</span></div>
                                    <div class="checkout__order__total">Tổng <span><?= number_format($total_price) ?> VNĐ</span></div>
                                   
                                    <input type="hidden" name="total" value="<?= $total_price ?>">


                                    <button type="submit" class="site-btn">
                                        ĐẶT HÀNG</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

<?php

    }
}

?>