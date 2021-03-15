<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
            ['label' => 'Back to website', 'url' => ['/site/index']],
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container" style="margin-top:70px;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

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
            <a class="h-card" href="https://twitter.com/TravelMoravia"><i class="material-icons" data-toggle="twitter">&#xf099;</i></a>
            <a class="h-card" href="https://facebook.com/TravelMoravia"><i class="material-icons" data-toggle="facebook">&#xf230;</i></a>
            <a class="h-card" href="https://instagram.com/TravelMoravia"><i class="material-icons" data-toggle="instagram">&#xf16d;</i></a>
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
