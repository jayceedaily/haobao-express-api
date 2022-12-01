<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendLoginOtpJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|digits:10',
            'otp'       => 'nullable|digits:6'
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {

            return response([
                'message' => 'INVALID_CREDENTIALS'
            ], 401);
        }

        if ($request->mobile && $request->otp) {
            return $this->login($request, $user);
        }

        return $this->intent($request, $user);
    }

    private function intent(Request $request, User $user)
    {
        if ($user->otp_expired_at?->gte(now())) {

            return response([
                'message' => 'OTP_ALREADY_SENT'
            ], 429, ['Retry-After' => $user->otp_expired_at]);
        }

        dispatch(new SendLoginOtpJob($user));

        return response([
            'message' => 'OTP_SENT',
        ], 200);
    }

    private function login(Request $request, User $user)
    {

        if (Hash::check($request->otp, $user->otp)) {

            if(\is_null($user->mobile_verified_at)) {

            }
            $user->resetOtp();
            $user->resetLoginAttempts();

            return response([
                'message' => 'TOKEN_CREATED',
                'data' => [
                    'token' => $user->createLoginToken()->plainTextToken
                ]
            ], 200);
        }

        $user->increment('login_attempts');

        return response([
            'message' => 'INVALID_OTP',
        ], 401);
    }
}
