<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */
/* @var $form yii\widgets\ActiveForm */

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

    <?= $form->field($model, 'width')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'height')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'depth')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'maxlength' => true]) ?>

    <?= $form->field($model, 'period')->textInput([]) ?>

    <?= $form->field($model, 'is_renovated')->checkbox()?>

    <?= $form->field($model, 'furniture_type_id')->dropDownList($types, ['prompt' =>'Wybierz typ mebla']) ?>

    <?= $form->field($model, 'furniture_style_id')->dropDownList($styles, ['prompt' =>'Wybierz styl mebla']) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Zdjęcie') ?>


    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn blue-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
