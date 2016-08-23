<?php
namespace TalkDemo\Domain\Model\User;

final class Username
{
    private $username;

    private function __construct($username)
    {
        $this->username = $username;
    }

    public static function fromString($username)
    {
        return new self($username);
    }

    public function equals(Username $otherName)
    {
        return $otherName->username === $this->username;
    }

    public function toString()
    {
        return $this->username;
    }

    public function __toString()
    {
        return $this->toString();
    }
}
