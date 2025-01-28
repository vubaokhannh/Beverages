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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form mt-4 mb-4 ">
                    <h2 class="text-center">Đăng nhập</h2>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ</label>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="./forgot-password.html" class="text-decoration-none">Quên mật khẩu?</a>
                            <a href="/register" class="ml-2 text-decoration-none">Đăng ký</a>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="site-btn">Đăng nhập</button>
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