<?php

namespace console\controllers;

use common\models\Number;
use Throwable;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Json;

/**
 * Number Controller Console
 */
class NumberController extends Controller
{
    /**
     * @return int
     * @throws Throwable
     */
    public function actionSendEmail(): int
    {
        $numbers = Number::find()->asArray()->all();

        if (!$numbers) {
            $this->stdout('Numbers not found!');
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $str = JSON::encode($numbers);

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['supportEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Numbers_' . date('Y-m-d'))
            ->setTextBody($str)
            ->send();

        $this->stdout('Email send successfully!');

        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionCreateNumberFile(): int
    {
        $numbers = Number::find()->asArray()->all();

        if (!$numbers) {
            $this->stdout('Numbers not found!');
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $content = JSON::encode($numbers);
        $fileName = 'numbers_' . date('Y-m-d') . '.txt';
        file_put_contents($fileName, $content);

        $this->stdout('File create successfully!');

        return ExitCode::OK;
    }

    /**
     * @return int
     * @throws Throwable
     */
    public function actionSet(): int
    {
        $number = new Number();
        $number->value = rand();

        if (!$number->insert()) {
            $this->stdout('Number not created!');
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $this->stdout('Number created successfully!');

        return ExitCode::OK;
    }

    /**
     * @param $id integer
     * @return int
     */
    public function actionGet(int $id): int
    {
        $numbers = Number::findOne($id);

        if (!$numbers) {
            $this->stdout('Number not found!');
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $data = JSON::encode($numbers);
        $this->stdout($data);

        return ExitCode::OK;
    }
}
