<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meble';
?>
<div class="catalog">

    <?php echo Yii::$app->controller->renderPartial('inc/filters', array('model'=> $filterForm, 'styles' => $styles, 'types' => $types));  ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "<div class='grid-header'>Wyświetlono <strong>{begin} - {end}</strong> z {totalCount}. Strona {page} z {pageCount}.</div>",
        'emptyText' => 'Brak danych do wyświetlenia.',
        'rowOptions' => function ($model, $index, $widget, $grid){
            return ['class'=>'furniture-row'];
        },
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
                'contentOptions' => ['class' => 'name'],
                'headerOptions' => [],
                'value' => function ($model) {
                        return $model->name;
                }
            ],
            [
                'label' => 'Cena',
                'format' => 'raw',
                'contentOptions' => ['class' => 'price'],
                'value' => function ($model) {
                    return $model->price . '.-';

                }
            ],
            [
                'label' => 'Styl',
                'format' => 'raw',
                'contentOptions' => ['class' => 'style'],
                'value' => function ($model) {
                    return $model->furnitureStyle->name;

                }
            ]
        ],
    ]); ?>
</div>

<?php

$this->registerJs('
    $(document).ready(function(){
        $(".furniture-row").on("click", function(){
            var id = $(this).attr("data-key");
            window.location.href = "view?id=" + id;
        });
    });

');


?>
