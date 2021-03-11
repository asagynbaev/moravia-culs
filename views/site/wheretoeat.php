<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Where To Eat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <!--services-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Our pick Restaurants</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Top selected restaurants from the Moravian Region are
                        available for your service.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">

            <?php foreach($restaurants as $rest): ?>
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="blog-post rounded border">
                    <div class="blog-img d-block overflow-hidden position-relative">
                        <img src="<?= $rest->image_url ?>" class="img-fluid rounded-top"
                            alt="underground restaurant room">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="content p-3">
                        <h4 class="mt-2"><?= $rest->name ?></h4>
                        <p class="text-muted mt-2"><?= $rest->description ?></p>

                    </div>
                </div>
                <!--end blog post-->
            </div>
            <!--end col-->
            <?php endforeach ?>

        </div>
        <!--end row-->
    </div>
</div>
