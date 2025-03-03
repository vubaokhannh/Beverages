<?php

namespace App\View\Admin\Page\Warehouse;

use App\View\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>


        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Basic Bootstrap Table -->
                <div class="card mb-3">
                    <h5 class="card-header">Danh sách sản phẩm</h5>
                    <div class="card-body">
                        <!-- Basic Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Kho</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                    <!-- <h5 class="card-header">Table Basic</h5> -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <form action="/admin/products/search" method="get">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                                        <input type="text" class="form-control" name="keywords"
                                            value="" placeholder="Tìm kiếm"
                                            aria-label="Tìm kiếm" aria-describedby="basic-addon-search31" />
                                    </div>

                                </form>
                            </div>
                            <div class=" col-6 mb-3">
                                <select
                                    class="form-select "
                                    name=""
                                    id="">
                                    <option selected>Lọc trạng thái</option>
                                    <option value="">Hoạt động</option>
                                    <option value="">Tạm dừng</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 30px">Id</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy chỉnh</th>
                                </tr>
                            </thead>


                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($data['inventory'] as $item):
                                ?>
                                    <tr>

                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= $item['unit'] ?></td>
                                        <td><?= $item['created_at'] ?></td>


                                        <td>
                                            <a href="/admin/warehouse/edit/<?= $item['id'] ?>"
                                                class="btn btn-sm btn-primary">Sửa</a>
                                            <a href="/admin/warehouse/delete/<?= $item['id'] ?>"
                                                class="btn btn-sm btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>



                            </tbody>

                        </table>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->

                <hr class="my-12" />
            </div>



    <?php
    }
}
