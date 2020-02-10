<?php

namespace saritasa\yii2\audit\panels;

use saritasa\yii2\audit\components\panels\Panel;
use saritasa\yii2\audit\models\AuditMail;
use saritasa\yii2\audit\models\AuditMailSearch;
use Yii;
use yii\base\Event;
use yii\grid\GridViewAsset;
use yii\mail\BaseMailer;

/**
 * MailPanel
 * @package saritasa\yii2\audit\panels
 */
class MailPanel extends Panel
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Event::on(BaseMailer::className(), BaseMailer::EVENT_AFTER_SEND, function ($event) {
            AuditMail::record($event);
        });
    }

    /**
     * @inheritdoc
     */
    public function hasEntryData($entry)
    {
        return count($entry->mails) > 0;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return Yii::t('audit', 'Email Messages');
    }

    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return $this->getName() . ' <small>(' . count($this->_model->mails) . ')</small>';
    }

    /**
     * @inheritdoc
     */
    public function getDetail()
    {
        $searchModel = new AuditMailSearch();
        $params = \Yii::$app->request->getQueryParams();
        $params['AuditMailSearch']['entry_id'] = $params['id'];
        $dataProvider = $searchModel->search($params);

        return \Yii::$app->view->render('panels/mail/detail', [
            'panel'        => $this,
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function registerAssets($view)
    {
        GridViewAsset::register($view);
    }

}
