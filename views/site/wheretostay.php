<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Where To Stay';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <!--services-->
  <div class="container mt-5">
    <div class="col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Our pick Hotels</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <?php foreach($accommodations as $acc): ?>
                <tr>
                  <td class="p-0 text-center">
                  </td>
                  <td class="align-middle">
                    <img src="<?= $acc->locationImages[0]->image_url ?>" alt="pension the hill">
                  </td>
                  <td><b><?= $acc->name ?> </b><br><br>
                    <?= $acc->description ?>
                    <span class="review-hotel"><a href="#">Click here to review</a></span>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
