<?php

namespace App\View\Admin\Layouts;

use App\View\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $currentPath = strtok($_SERVER['REQUEST_URI'], '?');
        $adminOrder = ['/admin/order/delivering', '/admin/products/success'];
?>
        <!doctype html>

        <html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
            data-assets-path="/public/assets/admin/assets/" data-template="vertical-menu-template-free"
            data-style="light">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

            <title></title>

            <meta name="description" content="" />

            <!-- Favicon -->
            <link rel="icon" type="image/x-icon" href="/public/assets/admin/assets/img/favicon/favicon.ico" />

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
                rel="stylesheet" />

            <link rel="stylesheet" href="/public/assets/admin/assets/vendor/fonts/boxicons.css" />

            <!-- Core CSS -->
            <link rel="stylesheet" href="/public/assets/admin/assets/vendor/css/core.css"
                class="template-customizer-core-css" />
            <link rel="stylesheet" href="/public/assets/admin/assets/vendor/css/theme-default.css"
                class="template-customizer-theme-css" />
            <link rel="stylesheet" href="/public/assets/admin/assets/css/demo.css" />

            <!-- Vendors CSS -->
            <link rel="stylesheet"
                href="/public/assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
            <link rel="stylesheet" href="/public/assets/admin/assets/vendor/libs/apex-charts/apex-charts.css" />

            <!-- Page CSS -->

            <!-- Helpers -->
            <script src="/public/assets/admin/assets/vendor/js/helpers.js"></script>
            <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
            <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
            <script src="/public/assets/admin/assets/js/config.js"></script>

            <script src="/ckeditor4/ckeditor/ckeditor.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


            <!-- Bootstrap Icons -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        </head>

        <body>
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <!-- Menu -->

                    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                        <div class="app-brand demo">
                            <a href="/admin" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path
                                                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                                id="path-1"></path>
                                            <path
                                                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                                id="path-3"></path>
                                            <path
                                                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                                id="path-4"></path>
                                            <path
                                                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                                id="path-5"></path>
                                        </defs>
                                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                        <mask id="mask-2" fill="white">
                                                            <use xlink:href="#path-1"></use>
                                                        </mask>
                                                        <use fill="#696cff" xlink:href="#path-1"></use>
                                                        <g id="Path-3" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-3"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                        </g>
                                                        <g id="Path-4" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-4"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                        </g>
                                                    </g>
                                                    <g id="Triangle"
                                                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                        <use fill="#696cff" xlink:href="#path-5"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="app-brand-text demo menu-text fw-bold ms-2">OGANI</span>
                            </a>

                            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                                <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                            </a>
                        </div>

                        <div class="menu-inner-shadow"></div>

                        <ul class="menu-inner py-1">
                            <!-- Dashboards -->
                            <li class="menu-item  <?= $currentPath == '/admin' ? 'active open' : '' ?>">
                                <a href="/admin" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-home-smile"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="menu-item <?= strpos($currentPath, '/admin/products') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-box"></i>
                                    <div class="text-truncate" data-i18n="User interface">Sản phẩm</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/products' ? 'active' : '' ?>">
                                        <a href="/admin/products" class="menu-link">
                                            <div class="text-truncate" data-i18n="Carousel">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/products/create' ? 'active' : '' ?>">
                                        <a href="/admin/products/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Collapse">Thêm mới</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Layouts -->
                            <li class="menu-item <?= strpos($currentPath, '/admin/categories') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Danh mục sản phẩm</div>
                                </a>

                                <ul class="menu-sub">

                                    <li class="menu-item <?= $currentPath == '/admin/categories' ? 'active' : '' ?>">
                                        <a href="/admin/categories" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/categories/create' ? 'active' : '' ?>">
                                        <a href="/admin/categories/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm mới</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item <?= strpos($currentPath, '/admin/users') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Khách hàng</div>
                                </a>

                                <ul class="menu-sub">

                                    <li class="menu-item <?= $currentPath == '/admin/users' ? 'active' : '' ?>">
                                        <a href="/admin/users" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/users/create' ? 'active' : '' ?>">
                                        <a href="/admin/users/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm mới</div>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="menu-item  <?= strpos($currentPath, '/admin/posts') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-detail"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Bài viết</div>
                                </a>

                                <ul class="menu-sub">

                                    <li class="menu-item <?= $currentPath == '/admin/posts' ? 'active' : '' ?>">
                                        <a href="/admin/posts" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/posts/create' ? 'active' : '' ?>">
                                        <a href="/admin/posts/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm mới</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item <?= strpos($currentPath, '/admin/vourcher') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Vourcher</div>
                                </a>

                                <ul class="menu-sub">

                                    <li class="menu-item <?= $currentPath == '/admin/vourcher' ? 'active' : '' ?>">
                                        <a href="/admin/vourcher" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/vourcher/create' ? 'active' : '' ?>">
                                        <a href="/admin/vourcher/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm mới</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-item  <?= strpos($currentPath, '/admin/orders') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-box"></i>
                                    <div class="text-truncate" data-i18n="User interface">Đơn hàng</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/orders' ? 'active' : '' ?>">
                                        <a href="/admin/orders" class="menu-link">
                                            <div class="text-truncate" data-i18n="Carousel">ĐH chờ xử lý </div>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/orders/transport' ? 'active' : '' ?>">
                                        <a href="/admin/orders/transport" class="menu-link">
                                            <div class="text-truncate" data-i18n="Carousel">ĐH đang vận chuyển </div>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/orders/success' ? 'active' : '' ?>">
                                        <a href="/admin/orders/success" class="menu-link">
                                            <div class="text-truncate" data-i18n="Carousel">ĐH giao thành công </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item <?= strpos($currentPath, '/admin/materials') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Nguyên liệu</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/materials' ? 'active' : '' ?>">
                                        <a href="/admin/materials" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/materials/create' ? 'active' : '' ?>">
                                        <a href="/admin/materials/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm mới</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item <?= strpos($currentPath, '/admin/recipes') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Công thức món ăn</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/recipes' ? 'active' : '' ?>">
                                        <a href="/admin/recipes" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/recipes/create' ? 'active' : '' ?>">
                                        <a href="/admin/recipes/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Thêm công thức</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item <?= strpos($currentPath, '/admin/warehouse') === 0 ? 'active open' : '' ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div class="text-truncate" data-i18n="Layouts">Kho</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item <?= $currentPath == '/admin/warehouse' ? 'active' : '' ?>">
                                        <a href="/admin/warehouse" class="menu-link">
                                            <div class="text-truncate" data-i18n="Container">Tất cả</div>
                                        </a>
                                    </li>
                                    <li class="menu-item <?= $currentPath == '/admin/warehouse/create' ? 'active' : '' ?>">
                                        <a href="/admin/warehouse/create" class="menu-link">
                                            <div class="text-truncate" data-i18n="Blank">Nhập kho</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- #region -->


                        </ul>
                    </aside>
                    <!-- / Menu -->
                    <div class="layout-page mt-4">
                        <!-- Navbar -->
                <?php

            }
        }

                ?>