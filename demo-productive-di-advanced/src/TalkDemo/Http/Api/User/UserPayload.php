<?php
namespace TalkDemo\Http\Api\User;

use TalkDemo\Domain\Model\User\User;
use TalkDemo\Http\Api\Payload;

final class UserPayload extends Payload
{
    private $user;

    private function __construct(User $user = null)
    {
        $this->user = $user;
    }

    public static function fromUser(User $user = null)
    {
        return new self($user);
    }

    public function user()
    {
        return $this->user;
    }

    public function userWasFound()
    {
        return !is_null($this->user);
    }
}
