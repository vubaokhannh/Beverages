<?php

namespace App\View\Client\Components;

use App\View\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
?>

                <div class="alert alert-success alert-dismissible" id="eroor">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h6><?= $value ?></h6>
                </div>

        <?php
            endforeach;
        endif;
        ?>

        <?php
        if (isset($_SESSION['error'])) :
            foreach ($_SESSION['error'] as $key => $value) :
        ?>
                <div class="alert alert-danger alert-dismissible" id="eroor">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h6><?= $value ?></h6>
                </div>
<?php
            endforeach;

        endif;
    }
}

?>