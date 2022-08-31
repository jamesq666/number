<?php

namespace api\modules\v1\models;

use common\models\NumberModel;

/**
 * NumberModel Model
 *
 * @property integer $id;
 * @property integer $value;
 */
class Number extends NumberModel
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
