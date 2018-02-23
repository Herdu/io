<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wiadomości z formularzy';
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach($messages as $message): ?>

        <div class="admin-message">
            <p class="message-author"><span>kto: </span><?=$message->email ?></p>
            <p class="message-title"><span>temat: </span>
                <?php
                    echo $message->message_title
                ?>
            </p>
            <p class="message-text"><span>kto: </span><?=$message->text ?></p>


            <p class="message-action">
                <?php
                echo Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['admin/delete', 'id' => $message->id]), [
                    'title' => 'Usuń',
                    'data' => [
                        'confirm' => 'Czy na pewno chcesz usunąć to ogłoszenie?',
                        'method' => 'post',
                    ],
                ]);

                ?>
            </p>

        </div>


    <?php endforeach; ?>

</div>
