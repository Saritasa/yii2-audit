<?php

use saritasa\yii2\audit\Audit;
use saritasa\yii2\audit\components\Access;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var saritasa\yii2\audit\models\AuditEntry $entry */

if ($auditEntry = Audit::getInstance()->getEntry()) {
    $style = YII_DEBUG ? '' : 'color:transparent;';
    if (Access::checkAccess()) {
        echo Html::a('audit-' . $auditEntry->id, ['/audit/entry/view', 'id' => $auditEntry->id], ['style' => $style]);
    } else {
        echo Html::tag('span', 'audit-' . $auditEntry->id, ['style' => $style]);
    }
}
