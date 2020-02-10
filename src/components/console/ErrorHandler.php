<?php
/**
 * Console compatible error handler
 */

namespace saritasa\yii2\audit\components\console;

use saritasa\yii2\audit\components\base\ErrorHandlerTrait;

/**
 * ErrorHandler
 * @package saritasa\yii2\audit\components\console
 */
class ErrorHandler extends \yii\console\ErrorHandler
{
    use ErrorHandlerTrait;
}
