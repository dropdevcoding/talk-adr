<?php
namespace TalkDemo\Http\Api\User;

use TalkDemo\Domain\Model\User\User;
use TalkDemo\Domain\Model\User\UserId;
use TalkDemo\Domain\Model\User\Username;
use TalkDemo\Http\AbstractAction;
use TalkDemo\Http\Parameters\Parameters;

final class FindUserAction extends AbstractAction
{
    protected function execute(Parameters $params)
    {
        $user = null;
        $id = (int) $params->ofQuery('id');

        // this repository has superpowers ;-)
        if ($id > 0) {
            $user = User::create(
                UserId::fromInteger($id),
                Username::fromString('User ' . $id)
            );
        }

        return UserPayload::fromUser($user);
    }
}
