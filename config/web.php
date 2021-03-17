<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$urlManager = require __DIR__ . '/_urlManager.php';
$aliases = require __DIR__ . '/_aliases.php';
$authManager = require __DIR__ . '/_authManager.php';
$log = require __DIR__ . '/_log.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'admin'],
    'aliases' => $aliases,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['sign-in', 'sign-up'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@', 'admin'],
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    Yii::$app->response->redirect(['/admin/user/sign-in']);
                },
            ],
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => md5('asdFw42Q'),
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
            'useFileTransport' => true,
        ],
        'log' => $log,
        'db' => $db,
        'urlManager' => $urlManager,
        'authManager' => $authManager,
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
