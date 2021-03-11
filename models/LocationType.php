<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LocationType extends ActiveRecord {

    public static function tableName() {
        return 'location_type';
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'name' => Yii::t('app', 'name')
        ];
    }

    public function destinationId() {
        $locationType = LocationType::find()
            ->where(['name' => 'Destination'])
            ->one();
        return $locationType->id;
    }

    public function restaurantId() {
        $restaurantId = LocationType::find()
            ->where(['name' => 'Restaurant'])
            ->one();
        return $restaurantId;
    }

    public function accommodationId() {
        $accommodationId = LocationType::find()
            ->where(['name' => 'Accommodation'])
            ->one();
        return $accommodationId;
    }

}