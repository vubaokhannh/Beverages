<?php

namespace App\View\Admin\Page\Recipes;

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
                    <h5 class="card-header">Danh sách công thức</h5>
                    <div class="card-body">
                        <!-- Basic Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Danh sách công thức</a>
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
                                    <th>Tên công thức</th>
                                    <th>Tên món ăn</th>
                                    <th>Thành phần</th>
                                    <th>Tùy chỉnh</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($data['recipes'] as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td><?= htmlspecialchars($item['productName']) ?></td>
                                        <td>
                                            <ul>
                                                <?php
                                                $recipesId = $item['id'];
                                                if (!empty($data['ingredientsByRecipe'][$recipesId])) { 
                                                    foreach ($data['ingredientsByRecipe'][$recipesId] as $ingredient) {
                                                        echo "<li>{$ingredient['quantity']} {$ingredient['unit']} {$ingredient['materialName']}</li>";
                                                    }
                                                } else {
                                                    echo "<li>Không có nguyên liệu</li>";
                                                }
                                                ?>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="/admin/recipes/edit/<?= $item['id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                            <a href="/admin/recipes/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
