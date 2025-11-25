<?php 

namespace Modules\Auth\Infrastruture\Services;

use Modules\Auth\Domain\Services\TokenService;
use Modules\Users\Domain\Entities\User;
use Modules\Users\Infrastructure\Persistence\Eloquent\UserModelRepository;
use Modules\Users\Infrastruture\Persistence\Eloquent\UserRepository;

class SanctumTokenService implements TokenService {
    protected UserModelRepository $modelRepository;

    public function __construct(UserModelRepository $model) {
        $this->model = $model;
    }

    public function createToken(User $user): string {
        $userModel = $this->modelRepository->findBy('id', $user->id());

        return $userModel->createToken('api-token')->plainTextToken;
    }
}