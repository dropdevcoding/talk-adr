<?php
namespace TalkDemo\Http\Responder;

final class ContainerResponderResolver extends \bitExpert\Adroit\Responder\Resolver\ContainerResponderResolver
{
    private $mappingStrategy;

    public function setMappingStrategy(MappingStrategy $mappingStrategy)
    {
        $this->mappingStrategy = $mappingStrategy;
    }

    public function resolve($identifier)
    {
        if ($this->mappingStrategy) {
            $identifier = $this->mappingStrategy->map($identifier);
        }

        return parent::resolve($identifier);
    }
}
