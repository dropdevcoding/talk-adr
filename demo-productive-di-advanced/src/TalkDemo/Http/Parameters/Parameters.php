<?php
namespace TalkDemo\Http\Parameters;

use Psr\Http\Message\ServerRequestInterface;

final class Parameters
{
    private $queryParams;
    private $bodyParams;
    private $cookieParams;

    private function __construct(ServerRequestInterface $request)
    {
        $this->queryParams = $request->getQueryParams();
        $this->bodyParams = $request->getParsedBody();
        $this->cookieParams = $request->getCookieParams();
    }

    public static function fromRequest(ServerRequestInterface $request)
    {
        return new self($request);
    }

    public function hasInQuery($key)
    {
        return $this->has($key, $this->queryParams);
    }

    public function ofQuery($key, $defaultValue = null)
    {
        return $this->get($key, $this->queryParams, $defaultValue);
    }

    public function hasInBody($key)
    {
        return $this->has($key, $this->bodyParams);
    }

    public function ofBody($key, $defaultValue = null)
    {
        return $this->get($key, $this->bodyParams, $defaultValue);
    }

    public function hasInCookie($key)
    {
        return $this->has($key, $this->cookieParams);
    }

    public function ofCookie($key, $defaultValue = null)
    {
        return $this->get($key, $this->cookieParams, $defaultValue);
    }

    private function has($key, $params)
    {
        return is_array($params) && isset($params[$key]);
    }

    private function get($key, $params, $defaultValue = null)
    {
        if (!$this->has($key, $params)) {
            if (is_null($defaultValue)) {
                throw new ParameterNotPresentException(sprintf(
                    'Parameter {0} could not be found',
                    $key
                ));
            }

            return $defaultValue;
        }

        return $params[$key];
    }
}
