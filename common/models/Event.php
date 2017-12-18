<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Event extends ActiveRecord
{
    public static function tableName()
    {
        return '{{events}}';
    }

    public function rules(){
        return [
            ['api_id', 'unique']
        ];
    }

}