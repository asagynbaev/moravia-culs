<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
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
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Where To Go', 'url' => ['/site/wheretogo']],
            ['label' => 'Where To Eat', 'url' => ['/site/wheretoeat']],
            ['label' => 'Where To Stay', 'url' => ['/site/wheretostay']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Admin Panel', 'url' => ['/admin']],
        ],
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
<?php
if($this->title == "Home" || $this->title == "Login")
    echo ("");
else
    echo("
    <!--Google map-->
    <div id='map-container-google-1' class='z-depth-1-half map-container' style='height: 10px; margin-top: 30px;'>
        <iframe src='https://www.google.com/maps/d/embed?mid=1aydHM17ZcDRIQ9RRjD4LlWDiMqNgNPeY' style='border:0'
            allowfullscreen></iframe>
    </div>
    <!--Google Maps-->
    ");
?>

<!--footer-->
<section id="footer">
    <div class="footer">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-4 footer-box">
            <p><b>Where to find us:</b></p>
            <p>Kamýcká 129, Prague 160 00, Czech Republic</p>
            <!--microformat geo-->
            <div class="geo">Location:
              <span class="latitude" title="50.1300303">50.1300303N</span>,
              <span class="longitude" title="14.3738181">14.3738181E</span>
            </div>
          </div>
          <div class="col-md-4 footer-box">
            <p>OUR SOCIAL MEDIA</p>
            <!--microformat hCard-->
            <a class="h-card" href="https://twitter.com/TravelMoravia"><img src="images/twitter.png"
                alt="Twitter icon"></a>
            <a class="h-card" href="https://facebook.com/TravelMoravia"><img src="images/instagram.png"
                alt="Instagram icon"></a>
            <a class="h-card" href="https://instagram.com/TravelMoravia"><img src="images/facebook.png"
                alt="Facebook icon"></a>
          </div>
          <div class="col-md-4 footer-box">
            <p>This website was made for study purposes by Gleb Dmitrievsky, Bunmeng Bo, Azimbek Sagynbaev.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
