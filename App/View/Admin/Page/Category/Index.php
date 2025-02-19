<?php

namespace App\View\Admin\Page\Category;

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
                <div class="card mb-3">
                    <h5 class="card-header">Danh sách loại sản phẩm</h5>
                    <div class="card-body">
                        <!-- Basic Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Danh sách loại sản phẩm</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <form action="/admin/categories/search" method="get">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" name="keywords"
                                    value=""
                                    placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="basic-addon-search31" />
                            </div>

                        </form>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 15px">Id</th>
                                    <th>Tên</th>
                                    <th style="width: 25%">Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chỉnh</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($data['category'] as $item):

                                ?>
                                    <tr>

                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td>
                                            <?php if ($item['status'] == 1): ?>
                                                <span class="badge bg-label-success me-1">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="badge bg-label-danger me-1">Tạm dừng</span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <a href="/admin/categories/<?= $item['id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
                                            <form action="/admin/categories/delete/<?= $item['id'] ?>" method="post"
                                                style="display: inline-block;">
                                                <input type="hidden" name="method" value="DELETE" id="">
                                                <button type="submit" class="btn btn-sm btn-danger">Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->

                <hr class="my-12" />

                <!-- Bootstrap Dark Table -->

                <!--/ Bootstrap Dark Table -->
            </div>
    <?php
    }
}
