<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>

<?php
echo $this->render('inc/contactForm', [
    'model' => $message,
    'messageTitles' => $messageTitles,
])
?>

<div class="row contact-row">
    <div class="col-sm-6">
        <p>
            754-453-566
        </p>
        <p>
            <a href="mailto:kontakt@katalogmebli.pl">kontakt@katalogmebli.pl</a>
        </p>
    </div>

    <div class="col-sm-6">
        <p>
            Artur Żmijewski
        </p>
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
</div>

</div> <!-- end of container in layout -->

<div id="map"></div>

<div>


<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlciqsWW-stepkpC2QHlwpElXqXoCtVoE&callback=initMap">
</script>
