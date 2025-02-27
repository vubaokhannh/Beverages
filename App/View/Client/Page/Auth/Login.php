<?php

namespace App\View\Client\Page\Auth;

use App\View\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>

        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Đăng nhập</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Đăng nhập</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <form action="/login" method="post">
                                <input type="hidden" name="method" value="POST">

                                <div class="card-body p-5 ">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                    </div>

                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" />
                                        <label class="form-check-label" for="form1Example3">Nhớ mật khẩu </label>
                                    </div>

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn site-btn btn-lg btn-block" type="submit">Đăng nhập</button>
                                    <p class="text-center mt-3">or</p>
                                    <a href="/register" class="">Bạn chưa có tài khoản đăng ký tại đây</a>
                                    <hr class="my-4">


                                    <a href="/login-google" class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;">Đăng nhập với Google</a>

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