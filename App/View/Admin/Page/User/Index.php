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
                            <tr>

                                <td>Khanh</td>
                                <td>
                                    <img src="" alt="User" class="img-fluid rounded-circle" />
                                </td>
                                <td>Khanh@gmail.com</td>
                                <td>0987654321</td>
                                <td>KG</td>
                                <td>
                                    <span class="badge bg-label-primary me-1">Hoạt động</span>
                                </td>
                                <td>
                                    <span class="badge bg-label-success me-1">Admin</span>
                                </td>
                                <td>
                                    <a href="/admin/users/edit" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                                </td>
                            </tr>



                        </tbody>
                    </table>





                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
<?php
    }
}
