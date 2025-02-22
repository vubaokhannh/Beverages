<?php

namespace App\View\Admin\Page\Warehouse;

use App\View\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-6">
                            <!-- Account -->
                            <div class="card-body">
                                <div class="">
                                    <h2 class="text-center">Nhập Kho</h2>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <form action="/admin/warehouse/store" id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="row g-6">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Tên nguyên liệu<span class="text-danger"> *</span></label>
                                            <input class="form-control" type="text" id="name" name="name" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="quantity" class="form-label">Số lượng<span class="text-danger"> *</span></label>
                                            <input class="form-control" type="text" id="quantity" name="quantity" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="unit_price" class="form-label">Giá tiền<span class="text-danger"> *</span></label>
                                            <input class="form-control" type="text" id="unit_price" name="unit_price" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="unit" class="form-label">Đơn vị tính<span class="text-danger"> *</span></label>
                                            <select name="unit" id="" class="select2 form-select">
                                                <option value="">Chọn đơn vị tính</option>
                                                <option value="1">Kg</option>
                                                <option value="2">Gam</option>
                                                <option value="3">Chai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="date" class="form-label">Ngày đặt hàng<span class="text-danger"> *</span></label>
                                            <input class="form-control" type="date" id="date" name="date" />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="status"> Trạng thái <span class="text-danger"> *</span></label>
                                            <select id="status" name="status" class="select2 form-select">
                                                <option value="">Chọn trang thái </option>
                                                <option value="1">Đang chờ xử lý</option>
                                                <option value="0">Đã nhận </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <button type="submit" class="btn btn-primary me-3" name>Thêm</button>
                                        <button type="reset" class="btn btn-outline-secondary" name>Nhập lại</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>
            <script>
                CKEDITOR.replace('description');
            </script>


    <?php
    }
}
