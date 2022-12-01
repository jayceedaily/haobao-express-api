<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendLoginOtpJob;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64|min:2',
            'mobile' => 'required|digits:10|unique:users,mobile',
        ]);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
        ]);

        dispatch(new SendLoginOtpJob($user));

        return response([
            'message' => 'USER_REGISTERED',
        ], 201);
    }
}
