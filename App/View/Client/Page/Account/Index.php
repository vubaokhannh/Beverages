<?php

namespace App\View\Client\Page\Account;

use App\View\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <section style="background-color: #eee;">
            <div class="container py-5">


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="/public/uploads/users/<?= $data['users']['avatar'] ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?= $data['users']['name'] ?></h5>
                                <!-- <p class="text-muted mb-1">Full Stack Developer</p>
                                <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                                <!-- <div class="d-flex justify-content-center mb-2">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"
                                            aria-selected="false">Đơn hàng đang chờ xử lý</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#tabs-2" role="tab"
                                            aria-selected="true">Đơn hàng đã đặt</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                            aria-selected="false">Đơn hàng đã hủy</a>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 nav-item">
                                        <a class="nav-link" href="/logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Họ và Tên</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $data['users']['name'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $data['users']['email'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Số điện thoại</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $data['users']['phone'] ?></p>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Địa chỉ</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $data['users']['address'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                                <div class="product__details__tab__desc">
                                                    <h5 class="text-center mb-3">Đơn hàng đang chờ xử lý</h5>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Số tiền </th>
                                                                <th>PT thanh toán</th>
                                                                <th>Trạng thái</th>
                                                                <th></th>
                                                            </tr>



                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data['orders_0'] as $orders_0):
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?= $orders_0['id'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= number_format($orders_0['total'], 2) ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php
                                                                        if ($orders_0['payment_method_id'] == 0) {
                                                                            echo 'Thanh toán trực tiếp';
                                                                        } elseif ($orders_0['payment_method_id'] == 1) {
                                                                            echo 'Thanh toán online';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($orders_0['status'] == 0) {
                                                                            echo 'Đang chờ xử lý';
                                                                        } elseif ($orders_0['status'] == 1) {
                                                                            echo 'Đã đặt';
                                                                        } elseif ($orders_0['status'] == 2) {
                                                                            echo 'Đã hủy';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>

                                                                        <a href="/admin/order/detail/<?= $orders_0['id'] ?>"
                                                                            class="btn btn-sm btn-primary">Xem chi tiết</a>

                                                                        </a>
                                                                    </td>

                                                                </tr>


                                                            <?php
                                                            endforeach; ?>

                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                                <div class="product__details__tab__desc">
                                                    <h5 class="text-center mb-3">Đơn hàng đã đặt</h5>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Số tiền </th>
                                                                <th>PT thanh toán</th>
                                                                <th>Trạng thái</th>
                                                                <th></th>
                                                            </tr>



                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data['orders_1'] as $orders_1):
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?= $orders_1['id'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= number_format($orders_1['total'], 2) ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php
                                                                        if ($orders_1['payment_method_id'] == 0) {
                                                                            echo 'Thanh toán trực tiếp';
                                                                        } elseif ($orders_1['payment_method_id'] == 1) {
                                                                            echo 'Thanh toán online';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($orders_1['status'] == 0) {
                                                                            echo 'Đang chờ xử lý';
                                                                        } elseif ($orders_1['status'] == 1) {
                                                                            echo 'Đã đặt';
                                                                        } elseif ($orders_1['status'] == 2) {
                                                                            echo 'Đã hủy';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>

                                                                        <a href="/admin/order/detail/<?= $orders_1['id'] ?>"
                                                                            class="btn btn-sm btn-primary">Xem chi tiết</a>

                                                                        </a>
                                                                    </td>

                                                                </tr>


                                                            <?php
                                                            endforeach; ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                                <div class="product__details__tab__desc">
                                                    <h5 class="text-center mb-3">Đơn hàng đã hủy</h5>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Số tiền </th>
                                                                <th>PT thanh toán</th>
                                                                <th>Trạng thái</th>
                                                                <th></th>
                                                            </tr>



                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data['orders_2'] as $orders_2):
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?= $orders_2['id'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= number_format($orders_2['total'], 2) ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php
                                                                        if ($orders_2['payment_method_id'] == 0) {
                                                                            echo 'Thanh toán trực tiếp';
                                                                        } elseif ($orders_2['payment_method_id'] == 1) {
                                                                            echo 'Thanh toán online';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($orders_2['status'] == 0) {
                                                                            echo 'Đang chờ xử lý';
                                                                        } elseif ($orders_2['status'] == 1) {
                                                                            echo 'Đã đặt';
                                                                        } elseif ($orders_2['status'] == 2) {
                                                                            echo 'Đã hủy';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>

                                                                        <a href="/admin/order/detail/<?= $orders_2['id'] ?>"
                                                                            class="btn btn-sm btn-primary">Xem chi tiết</a>

                                                                        </a>
                                                                    </td>

                                                                </tr>


                                                            <?php
                                                            endforeach; ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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