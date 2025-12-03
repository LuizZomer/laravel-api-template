<?php

namespace Modules\Auth\Application\UseCases;

use Auth;
use Illuminate\Auth\AuthenticationException;
use Modules\Users\Infrastructure\Mappers\UserMapper;
use Modules\Users\Infrastructure\Persistence\Eloquent\UserModel;

class MeUseCase {
    public function execute() {
        $userModel = Auth::user();

        if(! $userModel instanceof UserModel) {
            throw new AuthenticationException('Usuário não autenticado.');
        }

        $user = UserMapper::toDomain($userModel);

        return $user;
    }
}