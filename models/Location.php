<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\LocationType;

class Location extends ActiveRecord {

    public $image_url;

    public static function tableName() {
        return 'location';
    }

    public function rules() {
        return [
            ['name', 'required', 'message' => 'Please input name'],
            ['address', 'required', 'message' => 'Please input address'],
            ['description', 'required', 'message' => 'Please input description'],
            ['location_type', 'required', 'message' => 'Please select location type'],
        ];
    }

    public function getLocationImages() {
        return $this->hasMany(LocationImage::className(), ['location_id' => 'id']);
    }

    public function getLocationType() {
        return $this->hasOne(LocationType::className(), ['id' => 'location_type']);
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'description' => Yii::t('app', 'Description'),
            'location_type' => Yii::t('app', 'Location Type'),
            'locationType' => Yii::t('app', 'Location Type'),
        ];
    }

    public function getAll() {
        return Location::find()
            ->all();
    }

    public function getDestinations() {
        $locationType = new LocationType();
        return Location::find()
            ->where(['location_type' => $locationType->destinationId()])
            ->all();
    }

    public function getAccommodations() {
        $locationType = new LocationType();
        return Location::find()
            ->where(['location_type' => $locationType->accommodationId()])
            ->all();
    }

    public function getRestaurants() {
        $locationType = new LocationType();
        return Location::find()
            ->where(['location_type' => $locationType->restaurantId()])
            ->all();
    }

    public function getLastId() {
        $max_id = Location::find()->max('id');
        return $max_id;
    }

}