<?php
namespace TalkDemo\Http\Responder;

interface MappingStrategy
{
    public function map($payloadType);
}
