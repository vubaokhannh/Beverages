<?php

namespace App\View\Admin\Page\Material;

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
                  <h2 class="text-center">Sửa công thức </h2>
                </div>
              </div>
              <div class="card-body pt-4">
                <form action="/admin/recipes/store" id="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="method" id="" value="POST">
                  <div class="row g-6">
                    <div class="col-md-6">
                      <label for="name" class="form-label">Tên công thức <span class="text-danger"> *</span></label>
                      <input class="form-control" type="text" id="name" name="name" autofocus />
                    </div>
                    <div class="col-md-6">
                      <label for="product_id" class="form-label">Sản phẩm<span class="text-danger"> *</span></label>
                      <select class="form-control" id="product_id" name="product_id" aria-label="Default select example">
                        <option value="" selected>Chọn sản phẩm</option>
                        <?php
                        foreach ($data['products'] as $product) :
                        ?>
                          <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mt-3">
                      <div class="controls">
                        <div class="form">
                          <div class=" entry mb-3 row">
                            <div class="col-md-4">
                              <label class="control-label" for="date">Nguyên liệu <span class="text-danger">*</span></label>
                              <select class="form-control" id="materials_id" name="materials_id[]" aria-label="Default select example">
                                <option value="" selected>Chọn</option>
                                <?php
                                foreach ($data['materials'] as $materials) :
                                ?>
                                  <option value="<?= $materials['id'] ?>" data-unit="<?= $materials['unit'] ?> ">
                                    <?= $materials['name'] ?>
                                  </option>
                                <?php endforeach; ?>

                              </select>
                            </div>
                            <div class="col-md-3">
                              <label class="control-label" for="date">Số lượng <span class="text-danger">*</span></label>
                              <input class="form-control" name="quantity[]" type="text" placeholder="Số lượng">
                            </div>
                            <div class="col-md-4">
                              <label class="control-label" for="date">Đơn vị <span class="text-danger">*</span></label>
                              <input class="form-control" name="unit[]" type="text" placeholder="Đơn vị" readonly>
                            </div>
                            <div class="col-md-1">
                              <label for="">&nbsp;</label>

                              <label for="">&nbsp;</label>
                              <button class="btn btn-success btn-add" type="button">
                                <i class="bi bi-plus"></i>
                              </button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mt-6">
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
