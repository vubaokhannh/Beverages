<?php

namespace App\View\Client\Page\About;

use App\View\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
<section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giới thiệu</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Giới thiệu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

}
}

?>