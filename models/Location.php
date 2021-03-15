<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\LocationType;

class Location extends ActiveRecord {

    public $image_url;

    public static function tableName() {
        return 'location';
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'name' => Yii::t('app', 'name'),
            'address' => Yii::t('app', 'address'),
            'description' => Yii::t('app', 'description'),
            'location_type' => Yii::t('app', 'location_type')
        ];
    }

    public function getAll() {
        $locations = Location::find()
        ->all();

        return $this->locationsWithImageUrl($locations);
    }

    public function getDestinations() {
        $locationType = new LocationType();
        $locations = Location::find()
            ->where(['location_type' => $locationType->destinationId()])
            ->all();

        return $this->locationsWithImageUrl($locations);
    }

    public function getAccommodations() {
        $locationType = new LocationType();
        $locations = Location::find()
            ->where(['location_type' => $locationType->accommodationId()])
            ->all();

        return $this->locationsWithImageUrl($locations);
    }

    public function getRestaurants() {
        $locationType = new LocationType();
        $locations = Location::find()
            ->where(['location_type' => $locationType->restaurantId()])
            ->all();

        return $this->locationsWithImageUrl($locations);
    }

    public function getImageUrlFor($location_id) {
        $imageLocation = LocationImage::find()->where(['location_id' => $location_id])->one();
        return $imageLocation->image_url;
    }

    public function locationsWithImageUrl($locations) {
        $arr_locations = array();
        foreach($locations as $loc) {
            $image_url = $this->getImageUrlFor($loc->id);
            $loc->image_url = $image_url;
            array_push($arr_locations, $loc);
        }
        return $arr_locations;
    }

}