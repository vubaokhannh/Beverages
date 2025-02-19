<?php

namespace App\View\Admin\Page\Product;

use App\View\BaseView;

class Edit extends BaseView
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
                                    <h2 class="text-center">Sửa sản phẩm mới</h2>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <form action="/admin/update/<?= $data['products']['id'] ?>" id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="row g-6">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Tên <span class="text-danger"> *</span></label>
                                            <input class="form-control" type="text" id="name" name="name" value="<?= $data['products']['name'] ?>" />
                                        </div>
                                        <div class="col-md-12">
                                            <label for="image" class="form-label">Ảnh <span class="text-danger"> *</span></label>
                                            <input class="form-control" type="file" id="img" name="img" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="price" class="form-label">Giá gốc <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="price" name="price" value=" <?= $data['products']['price'] ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="discount_price">Giá giảm</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="discount_price" name="discount_price" class="form-control" value="<?= $data['products']['discount_price'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="date" class="form-label">Ngày tạo<span class="text-danger"> *</span></label>
                                            <input type="type" class="form-control" id="date" name="date" placeholder="" value="<?= $data['products']['date'] ?>" />
                                        </div>

                                        <div class="col-md-12">
                                            <label for="description" class="form-label">Mô tả <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" type="text" id="description" rows="7" name="description" value=""
                                                placeholder="Nhập mô tả"><?= $data['products']['description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="short_description" class="form-label">Mô tả ngắn <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" type="text" id="short_description" rows="5" name="short_description" value=""
                                                placeholder="Nhập mô tả"><?= $data['products']['short_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="status"> Trạng thái <span class="text-danger"> *</span></label>
                                            <select id="status" name="status" class="select2 form-select">
                                                <option value="">Chọn trang thái </option>
                                                <option value="0" <?php if ($data['products']['status'] == 0) echo 'selected="selected"'; ?>>Tạm dừng</option>
                                                <option value="1" <?php if ($data['products']['status'] == 1) echo 'selected="selected"'; ?>>Hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="category_id">Danh mục <span class="text-danger"> *</span></label>
                                            <select name="category_id" class="select2 form-select">
                                                <option value="">Vui lòng chọn ...</option>
                                                <?php
                                                foreach ($data['category'] as $item) :
                                                ?>
                                                    <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['products']['category_id']) ? 'selected' : ''  ?>><?= $item['name'] ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="mt-6">
                                        <button type="submit" class="btn btn-primary me-3" name>Lưu</button>
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
