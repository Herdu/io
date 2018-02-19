<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pictures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Picture', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'label' => 'Podgląd',
                'format' => 'image',
                'contentOptions' => ['class' => 'mini-image'],
                'headerOptions' => [],
                'value' => function ($model) {
                    if(empty($model->image_url)){
                        return Url::to('@web/image/placeholder.png');
                    }else{
                        return Url::to(Url::base().'/'.$model->image_url);
                    }
                }
            ],


            'id',
            'image_url:url',
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
