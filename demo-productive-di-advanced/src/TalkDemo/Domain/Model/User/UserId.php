<?php
namespace TalkDemo\Domain\Model\User;

final class UserId
{
    private $id;

    private function __construct($id)
    {
        $this->id = $id;
    }

    public static function fromInteger($id)
    {
        return new self($id);
    }

    public function equals(UserId $otherId)
    {
        return $otherId->id === $this->id;
    }

    public function toInteger()
    {
        return $this->id;
    }
}
