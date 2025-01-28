<?php

namespace App\View\Admin\Page\Vourcher;

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
                    <h5 class="card-header">Danh sách vourcher</h5>
                    <div class="card-body">
                        <!-- Basic Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Danh sách vourcher</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <form action="/admin/vourcher/search" method="get">
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
                                    <th>Id</th>
                                    <th>Tên</th>
                                    <th>Giá trị </th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Người sở hữu</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>

                                    <td>1</td>
                                    <td>Voucher 1</td>
                                    <td>5000đ</td>
                                    <td>2022-01-01</td>
                                    <td>2022-12-31</td>
                                    <td>Admin</td>
                                    <td>
                                        <span class="badge bg-label-primary me-1">Hoạt động</span>
                                    </td>
                                    <td>
                                        <a href="/admin/vourcher/edit" class="btn btn-sm btn-primary">Sửa</a>
                                        <a href="/admin/vourcher/delete/1" class="btn btn-sm btn-danger">Xóa</a>
                                    </td>



                                <tr>

                                   
                            


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
