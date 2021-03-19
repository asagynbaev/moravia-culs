<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Where To Go';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <!--services-->
    <div class="container mt-5">
        <div class="col-md-12 col-lg-12">

            <?php foreach($destinations as $dest): ?>

            <article class="post vt-post mb-5">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                        <div class="post-type post-img">
                            <img src="<?= $dest->locationImages[0]->image_url ?>" class="img-responsive" alt="Hills and rocks">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                        <div class="caption">
                            <h3 class="md-heading"><?= $dest->name ?></h3>
                            <p> <?= $dest->description ?>
                                <span class="more-detail-link"><a href="#">Click here for more detail</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <?php endforeach ?>

            <div class="clearfix"></div>
        </div>
        <!--Google map-->
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 10px">
            <iframe src="https://www.google.com/maps/d/embed?mid=1Z7znu7nmcoJ9PR7Hu45nBG03NutO3mzx" style="border:0"
                allowfullscreen></iframe>
        </div>
        <!--Google Maps-->
    </div>
</div>