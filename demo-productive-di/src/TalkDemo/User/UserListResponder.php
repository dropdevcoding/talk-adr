<?php
namespace TalkDemo\User;

use bitExpert\Adrenaline\Responder\Responder;
use bitExpert\Adroit\Domain\Payload;
use Psr\Http\Message\ResponseInterface;

final class UserListResponder implements Responder
{
    public function __invoke(Payload $payload, ResponseInterface $response)
    {
        $users = $payload->getValue('users');

        $response->getBody()->rewind();
        $response->getBody()->write(json_encode([
            'userList' => $users
        ]));

        return $response->withAddedHeader('Content-Type', 'application/json');
    }
}
