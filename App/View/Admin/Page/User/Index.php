<?php

namespace App\View\Admin\Page\User;

use App\View\BaseView;

class index extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-3">
                <h5 class="card-header">Danh sách khách hàng</h5>
                <div class="card-body">
                    <!-- Basic Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Danh sách khách hàng</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header">
                    <form action="/admin/users/search" method="get">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" name="keywords" placeholder="Tìm kiếm"
                                value="" aria-label="Tìm kiếm"
                                aria-describedby="basic-addon-search31" />
                        </div>

                    </form>
                </div>
                <div class="table-responsive text-nowrap">

                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Họ và Tên</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Trạng thái</th>
                                <th>Quyền</th>
                                <th>Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($data['users'] as $item):
                            ?>
                                <tr>

                                    <td><?= $item['name'] ?></td>
                                    <td>
                                        <img src="/public/uploads/users/<?= $item['avatar'] ?>" alt="User" class="img-fluid rounded-circle" width="70px" />
                                    </td>
                                    <td><?= $item['email'] ?></td>
                                    <td><?= $item['phone'] ?></td>
                                    <td><?= $item['address'] ?></td>

                                    <td>
                                        <?php if ($item['status'] == 1): ?>
                                            <span class="badge bg-label-success me-1">Hoạt động</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger me-1">Tạm dừng</span>
                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <?php if ($item['role'] == 1): ?>
                                            <span class="badge bg-label-secondary me-1">Quản trị</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger me-1">Khách hàng</span>
                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <a href="/admin/users/edit" class="btn btn-sm btn-primary">Sửa</a>
                                        <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>





                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
<?php
    }
}
