<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = 'Create Furniture';
$this->params['breadcrumbs'][] = ['label' => 'Furnitures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="furniture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate' => $false,
    ]) ?>

</div>
