<?php

namespace Modules\Users\Infrastruture\Mappers;

use Log;
use Modules\Users\Domain\Entities\User;
use Modules\Users\Infrastruture\Persistence\Eloquent\UserModel;

class CreateUserMapper {
    public static function modelToEntity(UserModel $userModel) {

        Log::debug($userModel->name);

        return new User(
            $userModel->name,
            $userModel->email,
            null,
            $userModel->id
        );
    }
}