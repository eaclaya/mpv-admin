<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(ApiLoginRequest $request)
    {
        $credentials = $request->validated();

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = auth()->user();

            // Check if the user already has a token
            $token = $user->tokens()->where('name', 'authToken')->first();

            if ($token) {
                // Return the existing token if it already exists
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token->token,
                ]);
            }

            // If no existing token, generate a new one
            $token = $user->createToken('authToken')->plainTextToken;

            // Return success response with the new token
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ]);
        }

        // Return error response if authentication fails
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
}
