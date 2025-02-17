<?php

namespace App\View\Admin\Components;

use App\View\BaseView;

class Notification extends BaseView
{
 public static function render($data = null)
 {
  if (isset($_SESSION['success'])):
   foreach ($_SESSION['success'] as $key => $value):
    ?>
    <div class="page-wrapper px-5">
     <div class="alert alert-success alert-dismissible w-75">   <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
      <strong><?= $value ?></strong>
     </div>
    </div>


    <?php
   endforeach;
  endif;
  ?>

  <?php
  if (isset($_SESSION['error'])):
   foreach ($_SESSION['error'] as $key => $value):
    ?>
    <div class="page-wrapper px-5">
     <div class="alert alert-danger alert-dismissible w-75">
      <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
      <strong><?= $value ?></strong>
     </div>
    </div>
    <?php
   endforeach;

  endif;
 }
}

?>