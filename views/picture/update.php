<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = 'Update Picture: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate' => true,
    ]) ?>

</div>
