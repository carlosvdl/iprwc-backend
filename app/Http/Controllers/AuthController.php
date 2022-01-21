<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Services\ShoppingCartService;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AuthController extends Controller
{

    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var ShoppingCartService
     */
    private $shoppingCartService;

    public function __construct(AuthService $authService, ShoppingCartService $shoppingCartService)
    {
        $this->authService = $authService;
        $this->shoppingCartService = $shoppingCartService;
    }

    public function register(RegisterRequest  $request) : JsonResponse
    {
        /**
         * @var JWTSubject $user
         */
        $user = $this->authService->register(
            new User,
            $request->validated()
        );

        $token = auth()->login($user);

        $this->shoppingCartService->create($user);

        return $this->respondWithToken($token);
    }

    public function login(LoginRequest $request) : JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function authUser() : JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout() : JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh() : JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json(['token' => $token]);
    }
}
