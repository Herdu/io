<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = $model->name;
?>
<div class="row furniture-view">
    <div class="col-sm-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?php
    if(empty($model->image_url)){
        $url = Url::to('@web/image/placeholder.png');
    }else {
        $url = Url::to(Url::base() . '/' . $model->image_url);
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

    <div class="col-sm-12">
        <?= Html::a('Generuj dokument', ['pdf', 'id' => $model->id], ['class'=>'btn btn-primary']) ?>
    </div>
    <div class="col-sm-12">

    <?php


    Modal::begin([
        'header' => '<h2>Wybierz rodzaj dokumentu</h2>',
        'toggleButton' => ['label' => 'Wygeneruj dokument', 'class' => 'btn'],
    ]);

     echo Html::a('Ze zdjęciami', ['pdf', 'id' => $model->id, 'withPhotos' => true ], ['class'=>'btn btn-primary']);
     echo Html::a('Bez zdjęć', ['pdf', 'id' => $model->id, 'withPhotos' => false], ['class'=>'btn btn-primary']);


        Modal::end();

    ?>
    </div>

</div>

    <?php
        echo $this->render('inc/contactForm', [
                'model' => $message,
                'furnitureId' => $model->id,
                'messageTitles' => $messageTitles,
        ])
    ?>



