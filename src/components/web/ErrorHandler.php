<?php
/**
 * Error handler version for web based modules
 */

namespace saritasa\yii2\audit\components\web;

use saritasa\yii2\audit\components\base\ErrorHandlerTrait;

/**
 * ErrorHandler
 * @package saritasa\yii2\audit\components\web
 */
class ErrorHandler extends \yii\web\ErrorHandler
{
    use ErrorHandlerTrait;
}
