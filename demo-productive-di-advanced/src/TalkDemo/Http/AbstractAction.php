<?php
namespace TalkDemo\Http;

use bitExpert\Adrenaline\Action\Action;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TalkDemo\Http\Parameters\Parameters;

abstract class AbstractAction implements Action
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->execute(Parameters::fromRequest($request));
    }

    abstract protected function execute(Parameters $params);
}
