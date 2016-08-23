<?php
namespace TalkDemo\User;

use bitExpert\Adrenaline\Action\Action;
use bitExpert\Adrenaline\Domain\DomainPayload;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ListUsersAction implements Action
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
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

        return new DomainPayload('userListResponder', $domainOutcome);
    }
}
