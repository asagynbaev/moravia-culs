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
        'pageSize' => 5,
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

            'id',
            'name',
            'address:ntext',
            'description:ntext',
            'location_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
