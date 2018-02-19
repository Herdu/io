<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($isUpdate): ?>
        <div class="offer-image-container">
            <?php
            if(!empty($model->image_url)){
                $photoUrl = Url::to(Url::base().'/'.$model->image_url);
            }else{
                $photoUrl = Url::to('@web/image/placeholder.png');
            }
            echo '<img src="'.$photoUrl.'" />';
            ?>
        </div>
    <?php endif; ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Zdjęcie') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
