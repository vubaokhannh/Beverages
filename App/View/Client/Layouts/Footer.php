<?php

namespace App\View\Client\Layouts;

use App\View\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="./index.html"><img src="img/logo.png" alt=""></a>
                            </div>
                            <ul>
                                <li><strong>Địa chỉ:</strong> 19, ấp kinh 5b, xã Tân An, huyện Tân Hiệp, tỉnh Kiên Giang</li>
                                <li><strong>Phone:</strong> +65 11.188.888</li>
                                <li><strong>Email:</strong> vubaokhanh2311@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Liên kết</h6>
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Về cửa hàng của chúng tôi</a></li>
                                <li><a href="#">Mua sắm an toàn</a></li>
                                <li><a href="#">Thông tin giao hàng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>

                            </ul>

                            <ul>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Phương thức đặt hàng</a></li>
                                <li><a href="#">Phương thức giao hàng</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                            <p>
                                Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                            <form action="#">
                                <input type="text" placeholder="Nhập email của bạn">
                                <button type="submit" class="site-btn">Đặt mua</button>
                            </form>
                            <div class="footer__widget__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Bản quyền &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> Mọi quyền được bảo lưu | Mẫu này được thực hiện với <i class="fa fa-heart" aria-hidden="true"></i> <a href="#" target="_blank">PC08901</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                            <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
        <script src="/public/assets/client/js/bootstrap.min.js"></script>
        <script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
        <script src="/public/assets/client/js/jquery-ui.min.js"></script>
        <script src="/public/assets/client/js/jquery.slicknav.js"></script>
        <script src="/public/assets/client/js/mixitup.min.js"></script>
        <script src="/public/assets/client/js/owl.carousel.min.js"></script>
        <script src="/public/assets/client/js/main.js"></script>



        </body>
<?php

    }
}

?>