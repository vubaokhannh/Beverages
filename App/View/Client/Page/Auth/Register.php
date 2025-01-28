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

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form mt-4 mb-4 ">
                    <h2 class="text-center">Đăng ký</h2>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ và Tên </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                      
                        <div class="text-center">
                            <button type="submit" class="site-btn">Đăng ký</button>
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