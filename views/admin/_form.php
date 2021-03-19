<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LocationType;

/* @var $this yii\web\View */
/* @var $model app\models\location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php 
        $form = ActiveForm::begin();
        $items = LocationType::find()->select(['name'])->indexBy('id')->column();
     ?>

    <?= $form->field($model, 'id')->textInput(['readonly' => true])->label('ID') ?>

    <?= $form->field($model, 'name' )->textInput(['maxlength' => true])->label('Name') ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6])->label('Address') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Description') ?>

    <?= $form->field($model, 'location_type')->dropdownlist($items)->label('Location Type') ?>

    <?= $form->field($model, 'image_url')->fileInput()->label('Please choose the image') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
