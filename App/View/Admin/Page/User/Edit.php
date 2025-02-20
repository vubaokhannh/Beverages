<?php

namespace App\View\Admin\Page\User;


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
                  <h2 class="text-center">Sửa khách hàng</h2>
                </div>
              </div>
              <div class="card-body pt-4">
                <form action="/admin/users/update/<?= $data['users']['id'] ?>" id="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="method" id="" value="PUT">
                  <div class="row g-6">
                    <div class="col-md-12">
                      <label for="name" class="form-label">Họ và Tên <span class="text-danger"> *</span></label>
                      <input class="form-control" type="text" id="name" name="name"  value="<?= $data['users']['name'] ?>" />
                    </div>

                    <div class="col-md-12">
                      <label for="avatar" class="form-label">Ảnh đại diện<span class="text-danger"> *</span></label>
                      <input class="form-control" type="file" id="avatar" name="avatar" />
                    </div>
                    <div class="col-md-6">
                      <label for="phone" class="form-label">Số điện thoại </label>
                      <input type="text" class="form-control" id="phone" name="phone" value="<?= $data['users']['phone'] ?>" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="email">Email <span class="text-danger"> *</span></label>
                      <div class="input-group input-group-merge">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $data['users']['email'] ?>" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <label for="address" class="form-label">Địa chỉ </label>
                      <textarea class="form-control" type="text" id="address" rows="5" name="address"
                        placeholder="Nhập địa chỉ"><?= $data['users']['address'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                      <label for="status" class="form-label">Trạng thái<span class="text-danger"> *</span></label>
                      <select id="status" class="select2 form-select" name="status">
                        <option value="">Chọn trạng thái</option>
                        <option value="1" <?= $data['users']['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="2" <?= $data['users']['status'] == 0 ? 'selected' : '' ?>>Tạm dừng</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="role" class="form-label">Quyền <span class="text-danger"> *</span></label>
                      <select id="role" class="select2 form-select" name="role">
                        <option value="">Chọn quyền</option>
                        <option value="0" <?= $data['users']['role'] == 0 ? 'selected' : '' ?>>Quản trị</option>
                        <option value="1" <?= $data['users']['role'] == 1 ? 'selected' : '' ?>>Khách hàng</option>
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

  <?php
  }
}
