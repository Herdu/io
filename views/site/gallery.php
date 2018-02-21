<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;
$this->title = 'gallery';
?>


<div class="row gallery-row">
    <?php foreach($photos as $photo): ?>
    <div class="col-sm-3 col-xs-6">
        <img src="<?= Url::to(Url::base().'/'.$photo->image_url); ?>" class="img-responsive" title="<?= $photo->title?>">
    </div>
    <?php endforeach; ?>
</div>



<?php
Modal::begin([
        'id' => 'gallery-modal',
        'header' => '<span class="custom-title"></span>',
]);

Modal::end();
?>

<?php

$this->registerJs('
    var myModal = $("#gallery-modal");
    $("img").click(function () {
            myModal.modal("show");
            console.log($(this).clone());
            myModal.find(".modal-body").html($(this).clone());
            myModal.find(".custom-title").html($(this).attr("title"));
        });
', View::POS_READY);
?>