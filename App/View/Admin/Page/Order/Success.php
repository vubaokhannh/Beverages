<?php

namespace App\View\Admin\Page\Order;

use App\View\BaseView;

class Success extends BaseView
{
    public static function render($data = null)
    {
        // echo '<pre>';
        // var_dump($data);
        // die;
?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Bootstrap Table -->
            <div class="card mb-3">
                <h5 class="card-header">Danh sách đơn hàng </h5>
                <div class="card-body">
                    <!-- Basic Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Danh sách đơn hàng</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <!-- <h5 class="card-header">Table Basic</h5> -->
                <div class="card-header">
                    <form action="/admin/products/search" method="get">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" name="keywords"
                                value="" placeholder="Tìm kiếm"
                                aria-label="Tìm kiếm" aria-describedby="basic-addon-search31" />
                        </div>

                    </form>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>

                                <th>Tên khách hàng</th>
                                <th>Số tiền thanh toán</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($data['order'] as $item):
                            ?>
                                <tr>

                                    <td><?= $item['name'] ?></td>
                                    <td><?= number_format($item['total']) ?> VNĐ</td>
                                    <td><?= $item['phone'] ?></td>
                                    <td><?= $item['email'] ?></td>
                                    <td><?= $item['address'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">Chi tiết</a>
                                    </td>
                                   
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="my-12" />


        </div>





<?php
    }
}
