<?php

namespace App\View\Client\Page\Account;

use App\View\BaseView;

class Order extends BaseView
{
    public static function render($data = null)
    {

?>
        <section class="breadcrumb-section set-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h3 class="text-center mb-3">Chi tiết đơn hàng</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Số tiền </th>
                                            <th>PT thanh toán</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>

                                        </tr>



                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <tr>
                                            <td><?= $data['order']['id'] ?></td>
                                            <td><?= number_format($data['order']['total']) ?> VND</td>
                                            <td>
                                                <?php
                                                if ($data['order']['payment_method_id'] == 0) {
                                                    echo 'Thanh toán trực tiếp';
                                                } elseif ($data['order']['payment_method_id'] == 1) {
                                                    echo 'Thanh toán online';
                                                }
                                                ?>

                                            </td>
                                            <td><?= $data['order']['phone'] ?></td>

                                            <td><?= $data['order']['address'] ?></td>
                                        </tr>
                                    </tbody>


                                    </tbody>
                                </table>
                                <h3 class=" mb-3">Sản phẩm</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá </th>
                                            <th>Số lượng</th>

                                        </tr>



                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <?php foreach ($data['order_details'] as $item):
                                        ?>

                                            <tr>
                                                <td><?= $item['pro_name'] ?></td>
                                                <td><img src="/public/uploads/products/<?= $item['pro_img'] ?>" alt="" width="100"></td>
                                                <td><?= number_format($item['price']) ?> VND</td>
                                                <td><?= $item['quantity'] ?></td>

                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


<?php

    }
}

?>