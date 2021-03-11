<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LocationImage extends ActiveRecord {

    public static function tableName() {
        return 'location_image';
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'location_id' => Yii::t('app', 'location_id'),
            'image_url' => Yii::t('app', 'image_url')
        ];
    }

}