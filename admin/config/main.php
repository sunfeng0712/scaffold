<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
    ],
    'aliases' => [
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-admin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the admin
            'name' => 'advanced-admin',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*'
        ]
    ],
    'params' => $params,
];
