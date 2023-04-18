<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendLoginOtpJob;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        return response([
            'data' => $user,
        ]);
    }
}
