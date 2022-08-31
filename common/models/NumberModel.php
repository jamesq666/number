<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * NumberModel Model
 *
 * @property integer $id;
 * @property integer $value;
 */
class NumberModel extends ActiveRecord
{
     /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'number';
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id', 'value'], 'integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'value' => 'Значение',
        ];
    }
}
