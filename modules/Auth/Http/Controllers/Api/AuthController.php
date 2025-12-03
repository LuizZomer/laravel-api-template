<?php

namespace Modules\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Modules\Auth\Application\UseCases\LoginUseCase;
use Modules\Auth\Application\UseCases\MeUseCase;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Users\Http\Resources\UserResource;

class AuthController extends Controller
{
    private LoginUseCase $loginUseCase;
    private MeUseCase $meUseCase;

    public function __construct(LoginUseCase $loginUseCase, MeUseCase $meUseCase)
    {
        $this->loginUseCase = $loginUseCase;
        $this->meUseCase = $meUseCase;
    }

    public function login(LoginRequest $request)
    {
        $dto = $request->toDto();

        $token = $this->loginUseCase->execute($dto);

        return response()->json(['content' => ['token' => $token]]);
    }

    public function me()
    {

        $user = $this->meUseCase->execute();

        return response()->json([
            'content' => [
                'user' => new UserResource($user)
            ]
        ]);
    }
}
