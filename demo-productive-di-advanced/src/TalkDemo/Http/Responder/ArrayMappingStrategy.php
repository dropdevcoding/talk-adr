<?php
namespace TalkDemo\Http\Responder;

final class ArrayMappingStrategy implements MappingStrategy
{
    private $mappings;

    public function __construct(array $mappings)
    {
        $this->mappings = $mappings;
    }

    public function map($payloadType)
    {
        return isset($this->mappings[$payloadType]) ? $this->mappings[$payloadType] : $payloadType;
    }
}
