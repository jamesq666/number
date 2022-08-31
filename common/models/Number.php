<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Number Model
 *
 * @property integer $id;
 * @property integer $value;
 */
class Number extends ActiveRecord
{
     /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{number}}';
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'value'], 'integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'value' => 'Значение',
        ];
    }
}
