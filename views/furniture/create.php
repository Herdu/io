<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = 'Dodaj mebel';

?>
<div class="furniture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate' => false,
        'types' => $types,
        'styles' => $styles,
    ]) ?>

</div>
