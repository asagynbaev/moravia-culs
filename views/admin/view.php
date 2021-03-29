<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\location */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="location-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address:ntext',
            'description:ntext',
            [
                'label' => 'Location Type',
                'attribute' => 'locationType.name',
            ],
            [
                'label' => 'Image',
                'format' => 'html',
                'value' => function ($data) {
                    $url = Yii::$app->request->baseUrl.'/'.$data->getImageUrl();
                    return Html::img($url, ['width' => '120px']);
                }
            ]
        ],
    ]) ?>

</div>
