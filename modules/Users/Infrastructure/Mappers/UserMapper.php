<?php

namespace Modules\Users\Infrastructure\Mappers;

use Modules\Users\Domain\Entities\User;
use Modules\Users\Infrastructure\Persistence\Eloquent\UserModel;

class UserMapper {
    public static function toDomain(UserModel $userModel) {
        return new User(
            $userModel->name,
            $userModel->email,
            null,
            $userModel->id
        );
    }
}