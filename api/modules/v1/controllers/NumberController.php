<?php

namespace api\modules\v1\controllers;

use common\models\Number;
use Throwable;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Number Controller API
 */
class NumberController extends Controller
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    /**
     * @return string[]
     * @throws Throwable
     */
    public function actionGenerate(): array
    {
        $number = new Number();
        $number->value = rand();

        if (!$number->insert()) {
            return ['message' => 'Number not created!'];
        }

        return ['message' => 'Number created successfully!'];
    }

    /**
     * @param $id integer
     * @return Number|string[]
     */
    public function actionRetrieve(int $id)
    {
        $number = Number::findOne($id);

        if (!$number) {
            return ['message' => 'Number not found!'];
        }

        return $number;
    }
}
