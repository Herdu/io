<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = $model->name;
?>
<div class="row furniture-view">
    <div class="col-sm-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?php
    if(empty($model->photo_url)){
        $url = Url::to('@web/image/placeholder.png');
    }else {
        $url = Url::to(Url::base() . '/' . $model->photo_url);
    }
    ?>
    <div class="col-sm-6">
        <img src="<?=$url?>" class="img-responsive">
    </div>

    <div class="col-sm-6">
        <div>
            styl: <?= $model->furnitureStyle->name; ?>
        </div>
        <div>
            okres: <?= $model->period; ?>
        </div>
        <div>
            wymiary:
            <div><?= $model->width; ?> [szerokość]</div>
            <div><?= $model->height; ?> [wysokość]</div>
            <div><?= $model->depth; ?> [głębokość]</div>
        </div>
    </div>

    <div class="col-sm-12">
        <?= $model->description; ?>
    </div>

</div>

    <?php
        echo $this->render('inc/contactForm', [
                'model' => $message,
                'furnitureId' => $model->id,
                'messageTitles' => $messageTitles,
        ])
    ?>



