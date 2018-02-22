<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = 'Create Picture';

?>
<div class="picture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate' => false,
    ]) ?>

</div>
