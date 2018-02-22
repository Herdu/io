<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = $model->name;

?>
<div class="furniture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć ten element?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'photo',
                'value'=> Url::base().'/'.$model->image_url,
                'format' => ['image',['width'=>'100%','height'=>'auto']],
            ],
            'id',
            'name',
            'price',
            'description',
            'is_renovated',
            'furniture_type_id',
            'furniture_style_id',
        ],
    ]) ?>

</div>
