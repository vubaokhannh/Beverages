<?php

namespace App\View\Client\Page\Auth;

use App\View\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
?>
        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Đăng ký</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Đăng ký</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form mt-4 mb-4 ">
                            <h2 class="text-center">Đăng ký</h2>
                            <form action="" method="post">
                                <input type="hidden" name="method" value="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Họ và Tên </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="re_password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="site-btn">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <form action="/register" method="post">
                                <input type="hidden" name="method" value="POST">

                                <div class="card-body p-5 ">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="name">Họ và Tên</label>
                                        <input type="text" id="name" class="form-control form-control-lg" name="name" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="re_password">Nhập lại mật khẩu</label>
                                        <input type="password" id="re_password" class="form-control form-control-lg" name="re_password" />
                                    </div>



                                    <a  class="btn site-btn btn-lg btn-block" type="submit">Đăng ký</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php

    }
}

?>