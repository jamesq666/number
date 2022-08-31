<?php

namespace api\modules\v1;

use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;

class Module extends \yii\base\Module
{
    /**
     * @var string
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * @return void
     */
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
        ];

        return $behaviors;
    }
}
