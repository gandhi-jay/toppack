<?php
return [
    'settings' => [
        'displayErrorDetails' => getenv("APP_DEBUG") === 'true' ? true : false, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'db' => [
            'host' => 'localhost',
            'user' => 'user',
            'pass' => 'password',
            'dbname' => 'toppack'
        ]
    ],
];
