<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'baseUrl' => '/admin-cabinet', // данный адрес соответсвует с тем адресом который мы задали в .htaccess из общего рута нашего приложения.
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
//            'cookieValidationKey' => '45ed697423АВЫ"№g9eheg00j09',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
//                '<controller:[\w\-]+>' => '<controller>/index',
//                '<controllerw\-]+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',
            ]
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['admin'],

            'roots' => [
//                'baseUrl'=>'@web',
//                'basePath'=>'@webroot',
//                'path' => 'web',
//                'name' => 'Files'
                [
                    'basePath'=>'@frontend/web/img',
                    'path' => 'uploads',
                    'name' => 'Files',
                    'options' => [
                        'uploadOverwrite' => false,
                        'uploadAllow' => array('image'),
                        'uploadOrder' => array('allow', 'deny'),
                        'uploadDeny'   => array(),
                        'uploadMaxSize' => '2000K',
//                        'disabled' => array('rename', 'mkfile'),
                    ],
                ],
            ],
            'watermark' => [
//                'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                'marginRight'    => 5,          // Margin right pixel
//                'marginBottom'   => 5,          // Margin bottom pixel
//                'quality'        => 95,         // JPEG image save quality
//                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ]
    ],
];
