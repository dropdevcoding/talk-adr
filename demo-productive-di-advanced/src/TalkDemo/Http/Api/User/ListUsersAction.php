<?php
namespace TalkDemo\Http\Api\User;

use TalkDemo\Domain\Model\User\User;
use TalkDemo\Domain\Model\User\UserId;
use TalkDemo\Domain\Model\User\Username;
use TalkDemo\Http\AbstractAction;
use TalkDemo\Http\Parameters\Parameters;

final class ListUsersAction extends AbstractAction
{
    protected function execute(Parameters $params)
    {
        // another awesome repository
        $users = [
            User::create(UserId::fromInteger(1), Username::fromString('User 1')),
            User::create(UserId::fromInteger(2), Username::fromString('User 2'))
        ];

        return UserListPayload::fromUsersArray($users);
    }
}
