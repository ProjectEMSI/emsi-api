<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorResponse(message: 'The provided credentials are incorrect.');
        }

        /** @var User $user */
        $user = Auth::user();

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $user->createToken(
                    $request->userAgent()
                )->plainTextToken
            ]
        ]);
    }

    public function register(RegisterRequest $request)
    {
        /** @var User $user */
        $user = User::query()->create([
            'name' => $request->post('name'),
            'username' => $request->post('username'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $user->createToken(
                    $request->userAgent()
                )->plainTextToken
            ]
        ]);
    }
}
