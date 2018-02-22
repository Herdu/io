<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = 'Zaktualizuj mebel: '.$model->name;

?>
<div class="furniture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate' => true,
        'types' => $types,
        'styles' => $styles,
    ]) ?>

</div>
