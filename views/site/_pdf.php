<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->registerCssFile("@web/css/themes/main.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-main');
?>



<p>Ogłoszenie z katalogmebli.pl</p>

<h2>1. Informacje o meblu</h2>

<div class="row pdf-view" style="text-align: center;">

    <?php
    if(empty($model->image_url)){
        $url = Url::to('@web/image/placeholder.png');
    }else {
        $url = Url::to(Url::base() . '/' . $model->image_url);
    }
    ?>
    <?php if($withPhotos):?>
    <div class="center">
        <img src="<?=$url?>" style="max-width: 800px; max-height: 600px; ">
    </div>
    <?php endif; ?>

    <h2><?= $model->name ?></h2>

    <div>
        <div>
            <table style="width: 100%; margin-top: 30px; margin-bottom: 50px;">
                <tr style="border: solid black 1px;">
                    <th style="width: 30%;">
                        styl
                    </th>
                    <td>
                        <?= $model->furnitureStyle->name; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        okres
                    </th>
                    <td>
                        <?= $model->period; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        szerokość
                    </th>
                    <td>
                        <?= $model->width; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        wysokość
                    </th>
                    <td>
                        <?= $model->height; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        głębokość
                    </th>
                    <td>
                        <?= $model->depth; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Opis
                    </th>
                    <td>
                        <?= $model->description; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<?php if($withPhotos):?>
<pagebreak />
<?php endif; ?>

<h2>2. Kontakt</h2>


<table style="width: 100%; line-height: 1.4; ">
    <tr>
        <td>
            <div style="display: inline-table; width: 40%;">
                <p>
                    tel: 754-453-566
                </p>
                <p>
                    <a href="mailto:kontakt@katalogmebli.pl" style="color: black; text-decoration: none; font-weight: bold;">kontakt@katalogmebli.pl</a>
                </p>

                <p>
                    Artur Żmijewski
                </p>
            </div>
        </td>
        <td>
            <div style="display: inline-table; width: 40%;">
                <p>
                    Katalog mebli S.p. z o.o.
                </p>
                <p>
                    Zamkowa 12
                </p>
                <p>
                    34-323 Poznań
                </p>
                <p>
                    NIP: 32123657543456754
                </p>
            </div>
        </td>
    </tr>
</table>
