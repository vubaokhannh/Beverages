<?php

namespace App\View\Client\Page\Cart;

use App\View\BaseView;

class Qr extends BaseView
{
    public static function render($data = null)
    {
?>
        <!doctype html>
        <html lang="en">

        <head>
            <title>Title</title>
            <!-- Required meta tags -->
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no" />

            <!-- Bootstrap CSS v5.2.1 -->
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                crossorigin="anonymous" />
        </head>

        <body>
            <header>
            
            </header>
            <main>

                <?php if (!empty($_SESSION['qr'])): ?>
                    <div class="modal" id="qrModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center">Thanh toán qua QR</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="<?= $_SESSION['qr'] ?>" alt="Mã QR" width="400px">
                                </div>

                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("qrModal").style.display = "block";
                            setTimeout(function() {
                                window.location.href = "/";
                            }, 60000);
                        });
                    </script>
                    <?php unset($_SESSION['qr']); ?>
                <?php endif; ?>
            </main>
           
            <script
                src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>

            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
        </body>

        </html>


<?php

    }
}

?>