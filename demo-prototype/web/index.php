<?php
require __DIR__ . '/../vendor/autoload.php';
    
use bitExpert\Adrenaline\Adrenaline;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use bitExpert\Adrenaline\Responder\JsonResponder;
use bitExpert\Adrenaline\Domain\DomainPayload;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;

$app = new Adrenaline();
$jsonResponder = new JsonResponder();

$app->get('users', '/user', function (ServerRequestInterface $request, ResponseInterface $response) use ($jsonResponder) {
    $domainOutcome = [
        'users' => [
            [
                'id' => 1,
                'firstname' => 'User 1'
            ],
            [
                'id' => 2,
                'lastname' => 'User 2'
            ]
        ]
    ];

    return $jsonResponder(new DomainPayload('users', $domainOutcome), $response);
});

$app->get('user', '/user/[:id]', function (ServerRequestInterface $request, ResponseInterface $response) use ($jsonResponder) {
    $params = $request->getQueryParams();
    $id = $params['id'];

    $user = (int) $id === 0 ? null : [
        'id' => (int) $id,
        'firstname' => 'User ' . $id
    ];

    $domainOutcome = [
        'user' => $user
    ];

    return $jsonResponder(new DomainPayload('user', $domainOutcome), $response);
});

$request = ServerRequestFactory::fromGlobals();
$response = new Response();
$app($request, $response);
