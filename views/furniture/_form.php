<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */
/* @var $form yii\widgets\ActiveForm */

var_dump($model);
?>

<div class="furniture-form">

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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'image_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_renovated')->checkbox()?>

    <?= $form->field($model, 'furniture_type_id')->textInput() ?>

    <?= $form->field($model, 'furniture_style_id')->textInput() ?>

    <div class="col-sm-6">
        <?= $form->field($model, 'imageFile')->fileInput()->label('Zdjęcie') ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
