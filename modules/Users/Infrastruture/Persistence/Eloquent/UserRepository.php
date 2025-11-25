<?php

namespace Modules\Users\Infrastruture\Persistence\Eloquent;

use Modules\Users\Domain\Entities\User;
use Modules\Users\Domain\Repositories\UserRepositoryInterface;
use Modules\Users\Infrastruture\Mappers\CreateUserMapper;

class UserRepository implements UserRepositoryInterface {
    protected UserModel $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function create(User $user): User {
        $newUser = $this->model->create([
            'name' => $user->name(),
            'email' => $user->email(),
            'password'=> $user->password(),
        ]);

        return CreateUserMapper::modelToEntity($newUser);
    }

    public function findBy(string $column, string $value): ?User
    {
        $model = $this->model->where($column, $value)->first();

        if (!$model) {
            return null;
        }

        return CreateUserMapper::modelToEntity($model);
    }
}