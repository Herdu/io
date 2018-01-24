<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = 'Zaktualizuj mebel: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Meble', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edycja';
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
