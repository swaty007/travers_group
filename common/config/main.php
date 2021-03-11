<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'i18n' => [
            'translations' => [
                'backend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'backend' => 'backend.php'
                    ],
                ],
                'frontend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'frontend' => 'frontend.php'
                    ],
                ],
            ],
        ],
    ],
    'sourceLanguage' => 'ru-RU',
    'language' => 'ru-RU',
];
