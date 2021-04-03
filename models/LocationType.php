<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LocationType extends ActiveRecord {

    public static function tableName() {
        return 'location_type';
    }

    public function getLocations() {
        return $this->hasMany(Location::className(), ['location_type' => 'id']);
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'name' => Yii::t('app', 'name')
        ];
    }

    public static function DESTINATION_ID() {
        $locationType = LocationType::find()
            ->where(['name' => 'Destination'])
            ->one();
        return $locationType->id;
    }

    public static function RESTAURANT_ID() {
        $locationType = LocationType::find()
            ->where(['name' => 'Restaurant'])
            ->one();
        return $locationType->id;
    }

    public static function ACCOMMODATION_ID() {
        $locationType = LocationType::find()
            ->where(['name' => 'Accommodation'])
            ->one();
        return $locationType->id;
    }

}