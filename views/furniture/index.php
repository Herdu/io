<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meble';
?>
<div class="furniture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj mebel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "<div class='grid-header'>Pokazano <strong>{begin} - {end}</strong> z {totalCount}. Strona {page} z {pageCount}.</div>",
        'emptyText' => 'Brak danych do wyświetlenia.',
        'columns' => [
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
            [
                'label' => 'Cena',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="td-label">Cena: </span>'.$model->price."zł.";

                }
            ],

            [
                'label' => 'Styl',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->furnitureStyle->name;

                }
            ],

            [
                'label' => 'Typ',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->furnitureType->name;

                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['class' => 'action-cell'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/furniture/view', 'id' => $model->id]), [
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
</div>
