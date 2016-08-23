<?php
$APP_CONF = [];

$APP_CONF['root_dir'] = realpath(__DIR__ . '/../');

$APP_CONF['di'] = [
    'config' => TalkDemo\Config::class,
    'cache' => $APP_CONF['root_dir'] . '/cache/di'
];

$APP_CONF['logger'] = [
    'file' => $APP_CONF['root_dir'] . '/logs/talkdemo.log',
    'level' => \Monolog\Logger::DEBUG
];
