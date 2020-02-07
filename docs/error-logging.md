# Error Logging

## Basic Configuration

If you want errors to be logged, you have to register the included errorhandler as well in you configuration:

```php
$config = [
    'components' => [
        'errorHandler' => [
           'class' => '\bedezign\yii2\audit\components\web\ErrorHandler',
        ],
    ],
];
```

## Emailing Errors

A command is available to email errors which can be added to your cron. 

```
php yii audit/error-email
```

You should ensure you have setup a `mailer` component and have a `scriptUrl` property in the `urlManager` component in your console configuration. In addition you need a `supportEmail` in your `params` setting.

For example:

```php
$console = [
    'params' => [
        'supportEmail' => 'errors@example.com',
    ],
    'components' => [
        'mailer' => [
            // see http://www.yiiframework.com/doc-2.0/guide-tutorial-mailing.html
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'urlManager' => [
            // required because the CLI script doesn't know the URL
            'scriptUrl' => 'http://example.com/',
        ],
    ],
]
```
