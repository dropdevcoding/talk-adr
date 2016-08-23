<?php
namespace TalkDemo\Http\Api\User;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

final class UserResponder
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * UserResponder constructor.
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param UserPayload $payload
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(UserPayload $payload, ResponseInterface $response)
    {
        $status = 404;
        $user = null;

        if ($payload->userWasFound()) {
            $status = 200;
            $user = $payload->user();
        }

        $response->getBody()->rewind();

        $serializationContext = new SerializationContext();
        $serializationContext->setSerializeNull(true);

        $response->getBody()->write($this->serializer->serialize([
            'user' => $user
        ], 'json', $serializationContext));

        return $response
            ->withAddedHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}
