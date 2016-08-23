<?php
require __DIR__ . '/../src/bootstrap.php';

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

$container = \bitExpert\Disco\BeanFactoryRegistry::getInstance();
$app = $container->get('application');

$request = ServerRequestFactory::fromGlobals();
$response = new Response();
$app($request, $response);
