<?php
namespace TalkDemo\Http\Api\User;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

final class UserListResponder
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * UserListResponder constructor.
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param UserListPayload $payload
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(UserListPayload $payload, ResponseInterface $response)
    {
        $users = $payload->users();
        $response->getBody()->rewind();
        $response->getBody()->write($this->serializer->serialize([
            'users' => $users
        ], 'json'));

        return $response->withAddedHeader('Content-Type', 'application/json');
    }
}
