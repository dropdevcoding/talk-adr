<?php
namespace TalkDemo;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use bitExpert\Slf4PsrLog\LoggerFactory;
use Psr\Log\LoggerInterface;

class ErrorHandler
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct()
    {
        $this->logger = LoggerFactory::getLogger(self::class);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $err)
    {
        $this->logger->error((string) $err);

        $response->getBody()->rewind();
        $response->getBody()->write('An exception occured: ' . $err->getMessage());

        return $response->withStatus(500);
    }
}
