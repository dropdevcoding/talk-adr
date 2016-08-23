<?php

// include and configure Composer autoloader
include(__DIR__ . '/../vendor/autoload.php');

// include the application configuration file. This global configuration file
// will contain all settings that are the same for every installation. Customize
// settings by using the config-local.inc.php
$configDir = __DIR__ . '/../config/';
require($configDir . 'config.php');

// Set-up logger infrastructure
if (isset($APP_CONF['logger'], $APP_CONF['logger']['file'], $APP_CONF['logger']['level'])) {
    $streamHandler = new \Monolog\Handler\StreamHandler($APP_CONF['logger']['file'], $APP_CONF['logger']['level']);
    
    // configure the Simple Logging Facade for PSR-3 loggers with a Monolog backend
    \bitExpert\Slf4PsrLog\LoggerFactory::registerFactoryCallback(function ($channel) use ($streamHandler) {
        if (!\Monolog\Registry::hasLogger($channel)) {
            $logger = new \Monolog\Logger($channel);
            $logger->pushHandler($streamHandler);
            \Monolog\Registry::addLogger($logger);
        }

        return \Monolog\Registry::getInstance($channel);
    });
}

$diCacheDirectory = $APP_CONF['di']['cache'];

if (!is_dir($diCacheDirectory)) {
    @mkdir($diCacheDirectory);
}

// Configure and set up the BeanFactory instance
$config = new \bitExpert\Disco\BeanFactoryConfiguration(
    $diCacheDirectory,
    null,
    null,
    true
);

$beanFactory = new \bitExpert\Disco\AnnotationBeanFactory($APP_CONF['di']['config'], $APP_CONF, $config);
\bitExpert\Disco\BeanFactoryRegistry::register($beanFactory);
