<?php return array(
    'db'          => [
        'host'     => 'db',
        'port'     => '3306',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'dev',
    ],
    'front'       => [
        'throwExceptions' => true,
        'showException'   => true,
    ],
    'template'    => [
        'forceCompile' => true,
    ],
    'phpsettings' => [
        'error_reporting' => E_ALL & ~E_USER_DEPRECATED,
        'display_errors'  => 1,
        'date.timezone'   => 'Europe/Berlin',
    ],
    /* uncomment if needed */
    /*'cdn' => [
        'backend'  => 'local',
        'adapters' => [
            'local' => [
                'type'     => 'local',
                'mediaUrl' => 'http://my-stage-shop-url.de/',
                'path'     => realpath(__DIR__.'/../../../'),
            ],
        ],
    ],*/
    'csrfProtection' => [
        'frontend' => false,
        'backend' => false
    ],
);
