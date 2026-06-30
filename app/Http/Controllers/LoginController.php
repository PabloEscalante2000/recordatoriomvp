<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "data" => [
                "type" => "token",
                "attributes" => [
                    "token" => $token,
                    "token_type" => "Bearer",
                ]
            ],
            "included" => [
                [
                    "type" => "user",
                    "attributes" => [
                        "id" => $user->id,
                        "name" => $user->name,
                        "email" => $user->email,
                    ]
                ]
            ]
        ]);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}
