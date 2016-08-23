<?php
namespace TalkDemo\Http\Api\User;

use TalkDemo\Http\Api\Payload;

final class UserListPayload extends Payload
{
    private $users;

    private function __construct(array $users)
    {
        $this->users = $users;
    }

    public static function fromUsersArray(array $users)
    {
        return new self($users);
    }

    public function users()
    {
        return $this->users;
    }
}
