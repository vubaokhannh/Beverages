<?php

namespace App\View\Admin\Page\Order;

use App\View\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        // echo '<pre>';
        // var_dump($data);
        // die;
?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Bootstrap Table -->
            <div class="card mb-3">
                <h5 class="card-header">Danh sách đơn hàng </h5>
                <div class="card-body">
                    <!-- Basic Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Danh sách đơn hàng</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <!-- <h5 class="card-header">Table Basic</h5> -->
                <div class="card-header">
                    <form action="/admin/products/search" method="get">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" name="keywords"
                                value="" placeholder="Tìm kiếm"
                                aria-label="Tìm kiếm" aria-describedby="basic-addon-search31" />
                        </div>

                    </form>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 15px">Id</th>
                                <th>Tên khách hàng</th>
                                <th>Số tiền thanh toán</th>
                                <th>Số điện thoại</th>
                                <th>Ngày Mua</th>
                                <th>Địa chỉ</th>
                                <th></th>
                                <th></th>




                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>1</td>
                                <td>Khanh</td>
                                <td>100000đ</td>
                                <td>0987654321</td>
                                <td>2022-01-01</td>
                                <td>Thành Phố HCM</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Chi tiết</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">Hủy đơn hàng</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- / Basic Bootstrap Table
      <div class="row my-5 justify-content-center">
          <nav aria-label="...">
            <ul class="pagination d-flex justify-content-center">
              <?php
                $currentPage = isset($_GET['pages']) ? intval($_GET['pages']) : 1;
                $totalPages = $data['total_pages'];

                $prevPage = $currentPage - 1;
                ?>
              <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $currentPage > 1 ? '/admin/products?pages=' . $prevPage : '#' ?>">
                  << </a>
              </li>

              <?php
                for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                  <a class="page-link" href="/admin/products?pages=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php endfor; ?>

              <?php
                $nextPage = $currentPage + 1;
                ?>
              <li class="page-item <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $currentPage < $totalPages ? '/admin/products?pages=' . $nextPage : '#' ?>"> >> </a>
              </li>
            </ul>
          </nav>

        </div> -->
            <hr class="my-12" />

            <!-- Bootstrap Dark Table -->

            <!--/ Bootstrap Dark Table -->
        </div>





<?php
    }
}
