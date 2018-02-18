<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

?>


<div class="contact-form-row">
        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'id' => 'contact-form',
        ]); ?>

        <div class="filter-pair">
            <div class="filter-item">
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="filter-item">
                <?= $form->field($model, 'message_title')->dropdownList($messageTitles) ?>
            </div>
        </div>

        <div class="filter-pair">
            <div class="filter-item">
                <?= $form->field($model, 'text')->textarea() ?>
            </div>
        </div>

    <?php
        if(!empty($furnitureId)){
            echo $form->field($model, 'furniture_id')->hiddenInput(['value'=> $furnitureId])->label(false);
        }
    ?>





        <div class="filter-pair">
            <div class="buttons">
                <?= Html::submitButton('Wyślij', ['class' => 'btn blue-btn']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
</div>




