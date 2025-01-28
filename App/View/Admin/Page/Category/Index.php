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
                                <tr>
                                    
                                    <td>1</td>
                                    <td>Trái cây</td>
                                    <td>Mô tả loại sản phẩm 1</td>
                                    <td>
                                        <span class="badge bg-label-primary me-1">Hoạt động</span>
                                    </td>
                                    <td>
                                    <a href="/admin/categories/edit" class="btn btn-sm btn-primary">Sửa</a>
                                    <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                </tr>
                                
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
