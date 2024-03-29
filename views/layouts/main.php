<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menu = [
        ['label' => 'Galeria', 'url' => Url::to(['site/gallery'])],
        ['label' => 'Katalog', 'url' => Url::to(['site/index'])],
        ['label' => 'Usługi', 'url' => Url::to(['site/services'])],
        ['label' => 'Kontakt', 'url' => Url::to(['site/contact'])],
    ];


    if (!Yii::$app->user->isGuest){

        $loggedMenu = [
            ['label' => 'Wiadomości', 'url' => Url::to(['admin/index'])],
            ['label' => 'Meble', 'url' => Url::to(['furniture/index'])],
            ['label' => 'Galeria', 'url' => Url::to(['picture/index'])],

            (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Wyloguj',
                    ['class' => 'logout btn', 'data-confirm' => 'Czy na pewno chcesz się wylogować?']
                    )
                . Html::endForm()
                . '</li>'
            )
        ];

        $menu = $loggedMenu;
    }


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">Mateusz Dobrowolski &copy; <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
