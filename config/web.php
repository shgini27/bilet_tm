<?php

$params = require('C:\xampp\htdocs\paramBasic\params.php');
$db = require('C:\xampp\htdocs\paramBasic\db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'WEsRl7srQajvaDqry_TOmGbcgW08l-KP',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'i18N' => ['translations' => [
						'app*' => [
							'class' => 'yii\i18n\PhpMessageSource',
							'fileMap' => [
								'app' => 'app.php'
								],
							],
						], 
					'class' => 'yii\i18n\PhpMessageSource'
		],
		
		
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
			//to send emails uncomment transport
			'transport' => [
                  'class' => 'Swift_SmtpTransport',
                  'host' => 'smtp.mail.ru',
                  'username' => $params['emailUser'],
                  'password' => $params['emailPassword'],
                  'port' => '465',//587
                  'encryption' => 'ssl',//tls
              ],
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
        'db' => $db,
		
		/*
		'urlManager' => [
		'enablePrettyUrl' => true,
		'showScriptName' => false,
		//'class'=>'frontend\components\LangUrlManager',
		'rules'=>[
			'/' => 'site/index',
			'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
			'<id:\d+>'                               => 'profile/show',
			'<action:(login|logout|auth)>'           => 'security/<action>',
			'<action:(register|resend)>'             => 'registration/<action>',
			'confirm/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'registration/confirm',
			'forgot'                                 => 'recovery/request',
			'recover/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'recovery/reset',
			'settings/<action:\w+>'                  => 'settings/<action>'
		]
		],*/
        
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				'<alias:\w+>' => 'site/<alias>',
				'about/<action:\w+>'              => 'about/<action>',
				'list/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'about/list',
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],*/
        
    ],
	
	'modules' => [
			'user' => [
				'class' => 'dektrium\user\Module',
				'enableUnconfirmedLogin' => false,
				'confirmWithin' => 21600,
				'cost' => 12,
				'admins' => ['admin']
			],
			'rbac' => 'dektrium\rbac\RbacWebModule',
	],
	
	// set target language to be Russian
	//'language' => ['ru-RU', 'tk-TKM'],
	// set source language to be English
	//'sourceLanguage' => 'en-US',

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
