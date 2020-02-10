<?php

namespace saritasa\yii2\audit\commands;

use saritasa\yii2\audit\Audit;
use saritasa\yii2\audit\models\AuditData;
use saritasa\yii2\audit\models\AuditEntry;
use saritasa\yii2\audit\models\AuditError;
use saritasa\yii2\audit\models\AuditJavascript;
use saritasa\yii2\audit\models\AuditMail;
use saritasa\yii2\audit\models\AuditTrail;
use Yii;
use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Task runner commands for Audit.
 *
 * @package saritasa\yii2\audit\commands
 */
class AuditController extends \yii\console\Controller
{

    /**
     * Clean up the audit data according to the settings.
     */
    public function actionCleanup()
    {
        $audit = Audit::getInstance();
        if ($audit->maxAge === null)
            return;
        $tables = [
            AuditError::tableName(),
            AuditData::tableName(),
            AuditJavascript::tableName(),
            AuditTrail::tableName(),
            AuditMail::tableName()
        ];

        $threshold = date('Y-m-d',time() - ($audit->maxAge * 86400));
        $connection = Yii::$app->db;
        $connection->enableLogging = false;
        $connection->enableProfiling = false;

        while (!empty($entries = AuditEntry::find()->where(['<', 'created', $threshold])->limit(1000)->all())) {
            Yii::getLogger()->messages = [];
            foreach ($entries as $entry) {
                foreach ($tables as $id => $table){
                    $connection->createCommand()->delete($table, 'entry_id=' . $entry->id)->execute();
                }

                $entry->delete();
            }

            unset($entries);
        }
        return;
    }


    /**
     * Email errors to support email.
     */
    public function actionErrorEmail()
    {
        $email = Yii::$app->params['supportEmail'];

        // find all errors to email
        $batch = AuditError::find()->where(['emailed' => 0])->batch();
        foreach ($batch as $auditErrors) {
            /** @var AuditError $model */
            foreach ($auditErrors as $model) {

                // define params and message
                $url = ['audit/default/view', 'id' => $model->entry_id];
                $params = [
                    'entry_id' => $model->entry_id,
                    'message' => $model->message,
                    'file' => $model->file,
                    'line' => $model->line,
                    'url' => Url::to($url),
                    'link' => Html::a(Yii::t('audit', 'view audit entry'), $url),
                ];
                $message = [
                    'subject' => Yii::t('audit', 'Audit Error in Audit Entry #{entry_id}', $params),
                    'text' => Yii::t('audit', '{message}' . "\n" . 'in {file} on line {line}.' . "\n" . '-- {url}', $params),
                    'html' => Yii::t('audit', '<b>{message}</b><br />in <i>{file}</i> on line <i>{line}</i>.<br/>-- {link}', $params),
                ];

                // send email
                Yii::$app->mailer->compose()
                    ->setFrom([$email => 'Audit :: ' . Yii::$app->name])
                    ->setTo($email)
                    ->setSubject($message['subject'])
                    ->setTextBody($message['text'])
                    ->setHtmlBody($message['html'])
                    ->send();

                // mark as emailed
                $model->emailed = 1;
                $model->save(false, ['emailed']);

            }
        }

    }

}
