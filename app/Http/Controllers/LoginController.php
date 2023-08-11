<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\Auth\GetUserByEmailJob;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Auth\Resource;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = GetUserByEmailJob::dispatchSync($validated['email']);

        if (! $user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        if (! Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return new Resource($user);
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = GetUserByEmailJob::dispatchSync($validated['email']);

        if ($user) {
            return response()->json([
                'message' => 'User already exists',
            ], 404);
        }

        $user = User::create($validated);

        return new Resource($user);
    }
}
