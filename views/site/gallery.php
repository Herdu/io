<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'gallery';
?>


<div class="row gallery-row">
    <?php foreach($photos as $photo): ?>
    <div class="col-sm-2">
        <img src="<?= Url::to(Url::base().'/'.$photo->image_url); ?>" class="img-responsive">
    </div>
    <?php endforeach; ?>
</div>
