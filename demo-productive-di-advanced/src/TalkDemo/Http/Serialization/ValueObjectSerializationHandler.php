<?php
namespace TalkDemo\Http\Serialization;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Context;

class ValueObjectSerializationHandler implements SubscribingHandlerInterface
{
    private static $valueObjectClass;
    private $valueAccessorFunction;

    public function __construct($valueObjectClass, $valueAccessorFunction)
    {
        self::$valueObjectClass = $valueObjectClass;
        $this->valueAccessorFunction = $valueAccessorFunction;
    }

    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => self::$valueObjectClass,
                'method' => 'serializeValueToJson',
            )
        );
    }

    public function serializeValueToJson(JsonSerializationVisitor $visitor, $valueObject, array $type, Context $context)
    {
        return $valueObject->{$this->valueAccessorFunction}();
    }
}
