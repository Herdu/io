<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

?>


<div class="row filter-row">

    <div class="filter-header">
        <h2>Filtrowanie</h2>

        <span class="glyphicon glyphicon-circle-arrow-up filter-control" id="hide-filters"></span>
        <span class="glyphicon glyphicon-circle-arrow-down filter-control" id="show-filters"></span>

    </div>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'id' => 'filter-form',
        'action' => Url::to(['index']),
    ]); ?>


    <div class="filters">


        <div class="filter-pair">
            <div class="filter-item">
                <?= $form->field($model, 'priceFrom')->input('number') ?>
            </div>
            <div class="filter-item">
                <?= $form->field($model, 'priceTo')->input('number') ?>
            </div>
        </div>

        <div class="filter-pair">
            <div class="filter-item">
                <?= $form->field($model, 'isRenovated')
                    ->dropDownList(['Bez znaczenia','Przed renowacją','Po renowacji'])
                ?>
            </div>
        </div>

        <div class="filter-pair">
            <div class="filter-item">
                <?= $form->field($model, 'styleId')
                    ->dropDownList($styles, ['prompt' => 'Wszystkie'])
                ?>
            </div>

            <div class="filter-item">
                <?= $form->field($model, 'typeId')
                    ->dropDownList($types, ['prompt' => 'Wszystkie'])
                ?>
            </div>
        </div>


        <div class="filter-pair">
            <div class="buttons">
                <?= Html::submitButton('Szukaj', ['class' => 'btn blue-btn']) ?>
                <?= Html::Button('Wyczyść' , array( 'class'=>'btn white-btn', 'id'=>'clear-filter-form-btn')); ?>
            </div>
        </div>

    </div>

    <div class="col-sm-6 col-sm-offset-3">
        <?= $form->field($model, 'text');
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

    $this->registerJs('
        $("#clear-filter-form-btn").on("click", function(){
            $("#filter-form input[type=\'number\']").val("").trigger("change");
            $(".field-offerfilterform-isrenovated option").attr("selected", false);
            $(".field-offerfilterform-isrenovated option[value=\'0\']").attr("selected", "selected");
        });
    ', View::POS_READY);


$this->registerJs('

        $("#hide-filters").click(function(){
            $(this).hide();
            $(".filters").hide(300);
            $("#show-filters").show();

        });
        
        $("#show-filters").click(function(){
            $(".filters").show(300);
            $(this).hide();
            $("#hide-filters").show();
        });

    ');
?>



