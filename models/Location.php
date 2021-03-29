<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\LocationType;
use app\models\LocationStatus;

class Location extends ActiveRecord {

    public $imageFile;

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

    public function getLocationStatus() {
        return $this->hasOne(LocationStatus::className(), ['id' => 'status']);
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
        return Location::find()
            ->where(['location_type' => LocationType::DESTINATION_ID(), 'status' => LocationStatus::ACTIVE_ID()])
            ->all();
    }

    public function getAccommodations() {
        return Location::find()
            ->where(['location_type' => LocationType::ACCOMMODATION_ID(), 'status' => LocationStatus::ACTIVE_ID()])
            ->all();
    }

    public function getRestaurants() {
        $locationType = new LocationType();
        return Location::find()
            ->where(['location_type' => LocationType::RESTAURANT_ID(), 'status' => LocationStatus::ACTIVE_ID()])
            ->all();
    }

    public function getLastId() {
        $max_id = Location::find()->max('id');
        return $max_id;
    }

    public function isStatusActive() {
        return $this->status == LocationStatus::ACTIVE_ID();
    }

    public function switchStatus() {
        if ($this->isStatusActive()) {
            $this->status = LocationStatus::INACTIVE_ID();
        }  else {
            $this->status = LocationStatus::ACTIVE_ID();
        }
    }

    public function getImageUrl() {
        if (empty($this->locationImages)) {
            return NULL;
        }
        return $this->locationImages[0]->image_url;
    }

    public function uploadImage() {
        if (empty($this->imageFile)) {
            return;
        }

        $imagePath = 'images/' . strtolower($this->locationType->name) . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $this->imageFile->saveAs($imagePath);
        $this->saveUploadedImage($imagePath);
    }

    private function saveUploadedImage($imagePath) {
        $modelLocationImage = LocationImage::find()->where(['location_id' => $this->id])->all();
        if (empty($modelLocationImage)) {
            $model = new LocationImage();
            $model->location_id = $this->id;
            $model->image_url = $imagePath;
            $model->save();
        } else {
            $modelLocationImage[0]->image_url = $imagePath;
            $modelLocationImage[0]->save();
        }
    }

}