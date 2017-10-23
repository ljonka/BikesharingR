<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
	//'urlManager' => [
        //    'enablePrettyUrl' => true,
        //    'showScriptName' => false,
        //    'enableStrictParsing' => true,
        //    'rules' => [
        //        // ...
        //    ],
        //],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
	'class' => 'yii\gii\Module',
	'allowedIPs' => ['2a01:1e8:e100:8506:28a3:3903:360f:9757', 'fe80::226:2dff:fe19:e4f7', '2a01:1e8:e100:8506:226:2dff:fe19:e4f7', '2002:5cd3:bf58:0:d82d:a923:63f2:7bca', '2002:5cd3:bf58:0:baac:6fff:fe71:edac', 'fe80::baac:6fff:fe71:edac', '92.211.191.88']
    ];
}

return $config;
