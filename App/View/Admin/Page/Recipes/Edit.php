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
                  <h2 class="text-center">Sửa nguyên liệu</h2>
                </div>
              </div>
              <div class="card-body pt-4">
                <form action="/admin/materials/update/<?= $data['material']['id'] ?>" id="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="method" id="" value="PUT">
                  <div class="row g-6">
                    <div class="col-md-6">
                      <label for="name" class="form-label">Tên <span class="text-danger"> *</span></label>
                      <input class="form-control" type="text" id="name" name="name" value="<?= $data['material']['name'] ?>" />
                    </div>
                    <div class="col-md-6">
                      <label for="unti" class="form-label">Đơn vị tính <span class="text-danger"> *</span></label>
                      <input class="form-control" type="text" id="name" name="unti" value="<?= $data['material']['unit'] ?>" />
                    </div>
                    <div class="col-md-12">
                      <label for="created_at" class="form-label">Ngày tạo<span class="text-danger"> *</span></label>
                      <input class="form-control" type="text" id="created_at" name="created_at" value="<?= $data['material']['created_at'] ?>" />
                    </div>
                  </div>

                  <div class="col-md-12 mt-6">
                    <button type="submit" class="btn btn-primary me-3" name>Lưu</button>
                    <button type="reset" class="btn btn-outline-secondary" name>Nhập lại</button>
                  </div>
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
