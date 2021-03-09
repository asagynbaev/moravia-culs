<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <!--services-->
    <section id="servicies">
        <div class="container text-center">
            <h1>WHAT MORAVIA CAN OFFER?</h1>
            <div class="row">
                <div class="col-md-4 servicies">
                    <a href="where-to-go.html">
                        <h4>Nature</h4>
                        <p>Moravia is known for its famous nature. You can find there lakes, mountaines, caves
                            and fresh air. Literally everything except the sea.</p>
                        <img src="images/Moravia-nature.jpg" class="service-img" alt="Hills and Castle">
                    </a>
                </div>
                <div class="col-md-4 servicies">
                    <a href="where-to-eat.html">
                        <h4>Food</h4>
                        <p>Moravia is known for its famous food. Cuisine from all over the World is presented here.
                            You can find your favourite dishes without a problem.</p>
                        <img src="images/Moravia-food.jpg" class="service-img" alt="Meat roll">
                    </a>
                </div>
                <div class="col-md-4 servicies">
                    <a href="where-to-stay.html">
                        <h4>Spa</h4>
                        <p>Outstanding hotels, reservations and spa's can be found here. Spa's and
                            aquaparks are waiting for visitors. Aqualand is the most popular.</p>
                        <img src="images/Moravia-spa.jpg" class="service-img" alt="Spa waterpool">
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
