<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php
$this->title = 'Logowanie';
?>

<div class="login-page">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=''>{input}</div>\n<div class=''>{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="form-group button-group">
                <?= Html::submitButton('Zaloguj się', ['class' => 'btn btn-primary blue-btn', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
