<?php
namespace TalkDemo\Domain\Model\User;

final class User
{
    private $id;
    private $username;

    private function __construct(UserId $id, Username $username)
    {
        $this->id = $id;
        $this->username = $username;
    }

    public static function create(UserId $id, Username $username)
    {
        return new self($id, $username);
    }

    public function id()
    {
        return $this->id;
    }

    public function username()
    {
        return $this->username;
    }
}
