<?php
require __DIR__ . '/../vendor/autoload.php';
    
use bitExpert\Adrenaline\Adrenaline;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use bitExpert\Adrenaline\Responder\JsonResponder;
use bitExpert\Adroit\Responder\Resolver\ContainerResponderResolver;
use bitExpert\Adrenaline\Domain\DomainPayload;
use bitExpert\Specialist\Container\ArrayContainer;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;

$usersResponder = function (DomainPayload $payload, ResponseInterface $response) {
    $users = $payload->getValue('users');

    $response->getBody()->rewind();
    $response->getBody()->write(json_encode([
        'userList' => $users
    ]));

    return $response->withAddedHeader('Content-Type', 'application/json');
};

$userResponder = function (DomainPayload $payload, ResponseInterface $response) {
    $status = 200;
    $user = $payload->getValue('user');
    if (is_null($user)) {
        $status = 404;
    }

    $response->getBody()->rewind();
    $response->getBody()->write(json_encode([
        'user' => $user
    ]));

    return $response
        ->withAddedHeader('Content-Type', 'application/json')
        ->withStatus($status);
};

$jsonResponder = new JsonResponder();

$respondersContainer = new ArrayContainer([
    'user' => $userResponder,
    'users' => $usersResponder
]);


$app = new Adrenaline([], [
    new ContainerResponderResolver($respondersContainer)
]);

/*$app->setErrorHandler(function (ServerRequestInterface $request, ResponseInterface $response, $err) {
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode([
        'error' => $err->getMessage()
    ]));

    return $response;
});*/

/*$app->beforeRouting(function (ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
    $params = $request->getQueryParams();

    if (!isset($params['token']) || $params['token'] !== 'mysupersecrettoken') {
        throw new \InvalidArgumentException('Invalid token given');
    }

    if ($next) {
        $response = $next($request, $response);
    }

    return $response;
});*/

$app->get('users', '/user', function (ServerRequestInterface $request, ResponseInterface $response) {
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

    return new DomainPayload('users', $domainOutcome);
});

$app->get('user', '/user/[:id]', function (ServerRequestInterface $request, ResponseInterface $response) {
    $params = $request->getQueryParams();
    $id = $params['id'];

    $user = (int) $id === 0 ? null : [
        'id' => (int) $id,
        'firstname' => 'User ' . $id
    ];

    $domainOutcome = [
        'user' => $user
    ];

    return new DomainPayload('user', $domainOutcome);
});

$request = ServerRequestFactory::fromGlobals();
$response = new Response();
$app($request, $response);
