<?php
namespace TalkDemo\User;

use bitExpert\Adrenaline\Action\Action;
use bitExpert\Adrenaline\Domain\DomainPayload;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

final class FindUserAction implements Action
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $params = $request->getQueryParams();
        $id = $params['id'];

        $user = (int) $id === 0 ? null : [
            'id' => (int) $id,
            'firstname' => 'User ' . $id
        ];

        $domainOutcome = [
            'user' => $user
        ];

        return new DomainPayload('userResponder', $domainOutcome);
    }
}
