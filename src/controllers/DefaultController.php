<?php

namespace saritasa\yii2\audit\controllers;

use saritasa\yii2\audit\components\web\Controller;
use Yii;

/**
 * DefaultController
 * @package saritasa\yii2\audit\controllers
 */
class DefaultController extends Controller
{
    /**
     * Module Default Action.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
