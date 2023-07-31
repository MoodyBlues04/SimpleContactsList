<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 */
class Contact extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone'], 'string'],
            // [['phone'], '\udokmeci\yii2PhoneValidator\PhoneValidator'],
        ];
    }
}
