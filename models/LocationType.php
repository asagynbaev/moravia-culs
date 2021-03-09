<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LocationType extends ActiveRecord {

    public $id;
    public $name;

    public static function tableName() {
        return 'location_type';
    }

}