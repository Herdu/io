<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zdjęcia w galerii';
?>
<div class="picture-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a($dataProvider->getTotalCount() > 1 ? 'Dodaj kolejne zdjęcie' : 'Dodaj zdjęcie' , ['create'], ['class' => 'btn btn-success']) ?>
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
            'title',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['class' => 'action-cell'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/picture/view', 'id' => $model->id]), [
                            'title' => 'Podgląd',
                        ]);
                    },

                    'update' => function ($url, $model) {

                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Edycja',
                        ]);
                    },
                    'delete' => function ($url, $model) {

                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Usuń',
                            'data' => [
                                'confirm' => 'Czy na pewno chcesz usunąć to ogłoszenie?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
