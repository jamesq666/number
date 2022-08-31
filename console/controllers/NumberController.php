<?php

namespace console\controllers;

use common\models\NumberModel;
use Throwable;
use Yii;
use yii\console\Controller;
use yii\helpers\Json;

/**
 * NumberModel Controller Console
 */
class NumberController extends Controller
{
    /**
     * @return void
     * @throws Throwable
     */
    public function actionSendEmail()
    {
        $numbers = NumberModel::find()->asArray()->all();

        if ($numbers) {
            $str = JSON::encode($numbers);

            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['supportEmail'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Numbers_' . date('Y-m-d'))
                ->setTextBody($str)
                ->send();
        } else {
            echo 'Numbers not found!';
        }
    }

    /**
     * @return void
     */
    public function actionCreateNumberFile()
    {
        $numbers = NumberModel::find()->asArray()->all();

        if ($numbers) {
            $str = JSON::encode($numbers);
            $file = 'numbers_' . date('Y-m-d') . '.txt';

            file_put_contents($file, $str);
        } else {
            echo 'Numbers not found!';
        }
    }
}
