<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LocationType;
use kartik\file\FileInput;
?>

<div class="location-form">

    <?php 
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        $items = LocationType::find()->select(['name'])->indexBy('id')->column();
     ?>

    <?php 
        if ($model->id == null) {
            echo '';
        } else {
            echo $form->field($model, 'id')->textInput(['readonly' => true])->label('ID');
        }
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name') ?>

    <?= $form->field($model, 'address')->textInput()->label('Address') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Description') ?>

    <?= $form->field($model, 'location_type')->dropdownlist($items)->label('Location Type') ?>

    <?php 
        $imageUrl = $model->getImageUrl();
        $url = Yii::$app->request->baseUrl.'/'.$imageUrl;
        
        $options = ['options' => ['accept' => 'image/*']];
        if (!empty($imageUrl)) {
            $options['pluginOptions'] = ['initialPreview' => [ $url ], 
                                        'initialPreviewAsData' => true,
                                        'initialCaption' => $model->name,
                                        'showUpload' => false];
        }

        echo $form->field($model, 'imageFile')->widget(FileInput::classname(), $options);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
