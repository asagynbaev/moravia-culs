<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LocationStatus extends ActiveRecord {

    public static function tableName() {
        return 'location_status';
    }

    public function getLocations() {
        return $this->hasMany(Location::className(), ['status' => 'id']);
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'status' => Yii::t('app', 'status'),
        ];
    }

    public function getActiveId() {
        $activeId = LocationStatus::find()
            ->where(['status' => 'Active'])
            ->one();
        return $activeId;
    }

    public function getInactiveId() {
        $inactiveId = LocationStatus::find()
            ->where(['status' => 'Inactive'])
            ->one();
        return $inactiveId;
    }

}