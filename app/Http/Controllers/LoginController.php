<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();

    }
}
