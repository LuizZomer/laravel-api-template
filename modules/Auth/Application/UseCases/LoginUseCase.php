<?php

namespace Modules\Auth\Application\UseCases;

use App\Shared\Domain\Services\PasswordHasher;
use Modules\Auth\Application\Dto\LoginDto;
use Modules\Auth\Domain\Services\TokenService;
use Modules\Users\Application\UseCases\FindUserByUseCase;
use Modules\Users\Domain\Entities\User;

class LoginUseCase {
    public FindUserByUseCase $findUserByUseCase;
    private PasswordHasher $passwordHasher;
    private TokenService $tokenService;

    public function __construct(FindUserByUseCase $findUserByUseCase, PasswordHasher $passwordHasher, TokenService $tokenService) {
        $this->findUserByUseCase = $findUserByUseCase;
        $this->passwordHasher = $passwordHasher;
        $this->tokenService = $tokenService;
    }

    public function execute(LoginDto $loginDto) {
        $user = $this->findUserByUseCase->execute('email', $loginDto->email);

        $this->validateUser($user, $loginDto->password);

        $token = $this->tokenService->createToken($user);

        return $token;
    }

    public function validateUser(?User $user, $password) {
        if(!$user || $this->passwordHasher->verify($password, $user->password())) {
            $this->throwInvalidCredentials();
        }
    }

    public function throwInvalidCredentials() {
        return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
    }
} 