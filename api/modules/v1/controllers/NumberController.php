<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Number;
use Throwable;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

/**
 * NumberModel Controller API
 */
class NumberController extends Controller
{
    /**
     * @return array[]
     */
    public function behaviors() {
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
    public function actionGenerate()
    {
        $number = new Number();
        $number->value = rand();

        if ($number->insert()) {
            return ['message' => 'Number created successfully!'];
        } else {
            return ['message' => 'Number not created!'];
        }
    }

    /**
     * @return Number|array
     */
    public function actionRetrieve($id)
    {
        $response = Number::findOne($id);

        if ($response) {
            return $response;
        } else {
            return ['message' => 'Number not found!'];
        }
    }
}
