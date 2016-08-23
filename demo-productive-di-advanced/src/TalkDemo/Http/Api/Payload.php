<?php
namespace TalkDemo\Http\Api;

class Payload implements \bitExpert\Adroit\Domain\Payload
{
    public function getType()
    {
        return static::class;
    }
}
