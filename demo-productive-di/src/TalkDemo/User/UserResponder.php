<?php
namespace TalkDemo\User;

use bitExpert\Adrenaline\Responder\Responder;
use bitExpert\Adroit\Domain\Payload;
use Psr\Http\Message\ResponseInterface;

final class UserResponder implements Responder
{
    public function __invoke(Payload $payload, ResponseInterface $response)
    {
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
    }
}
