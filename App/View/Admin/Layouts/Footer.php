<?php

namespace App\View\Admin\Layouts;

use App\View\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Footer -->

        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="/public/assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/public/assets/admin/assets/vendor/libs/popper/popper.js"></script>
        <script src="/public/assets/admin/assets/vendor/js/bootstrap.js"></script>
        <script src="/public/assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/public/assets/admin/assets/vendor/js/menu.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="/public/assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Main JS -->
        <script src="/public/assets/admin/assets/js/main.js"></script>

        <script src="/public/assets/admin/assets/js/sweetalert.js"></script>
        <script src="/public/assets/admin/assets/js/shippingUpdates.js"></script>

        <!-- Page JS -->
        <script src="/public/assets/admin/assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag before closing body tag for github widget button. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        </body>

        </html>
<?php
    }
}

?>