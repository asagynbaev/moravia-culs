<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Location;

/* @var $this yii\web\View */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider = new ActiveDataProvider([
    'query' => Location::find(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);

?>
<div class="location-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Location', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label' => 'Image',
                'format' => 'html',
                'value' => function ($data) {
                    $url = Yii::$app->request->baseUrl.'/'.$data->getImageUrl();
                    return Html::img($url, ['width' => '80px']);
                }
            ],
            'name',
            'address',
            'description',
            [
                'label' => 'Location Type',
                'attribute' => 'locationType.name'
            ],
            [
                'label' => 'Status',
                'attribute' => 'locationStatus.status'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
