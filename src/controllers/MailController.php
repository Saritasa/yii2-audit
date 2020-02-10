<?php

namespace saritasa\yii2\audit\controllers;

use saritasa\yii2\audit\components\Helper;
use saritasa\yii2\audit\components\web\Controller;
use saritasa\yii2\audit\models\AuditMail;
use saritasa\yii2\audit\models\AuditMailSearch;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * MailController
 * @package saritasa\yii2\audit\controllers
 */
class MailController extends Controller
{
    /**
     * Lists all AuditMail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditMailSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single AuditMail model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = AuditMail::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('The requested mail does not exist.');
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Download an AuditMail file as eml.
     * @param $id
     * @throws NotFoundHttpException
     */
    public function actionDownload($id)
    {
        $model = AuditMail::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('The requested mail does not exist.');
        }
        Yii::$app->response->sendContentAsFile(Helper::uncompress($model->data), $model->id . '.eml');
    }
}
