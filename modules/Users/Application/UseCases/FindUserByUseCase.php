<?php

namespace Modules\Users\Application\UseCases;

use App\Exceptions\EmailAlreadyExistsException;
use App\Shared\Domain\Services\PasswordHasher;
use Modules\Users\Application\Dto\CreateUserDto;
use Modules\Users\Domain\Entities\User;
use Modules\Users\Domain\Repositories\UserRepositoryInterface;
use Modules\Users\Infrastruture\Persistence\Eloquent\UserModel;

class FindUserByUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $column, mixed $value): ?User
    {
        return $this->userRepository->findBy($column, $value);
    }
}