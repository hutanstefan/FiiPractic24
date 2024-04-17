<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Token;
use Carbon\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('forgot_password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $userEmail = $request->only('email')['email'];

        $user = User::where('email', $userEmail)->first();
        if ($user) {
            $token = Str::random(60);

            $tokenModel = Token::create([
                'token' => $token,
                'user_id' => $user->id,
                'expires_at' => Carbon::now()->addHours(24),
            ]);

            $resetUrl = url('/reset-password/' . $tokenModel->token);

            Mail::raw("Link for password reset: $resetUrl", function ($message) use ($userEmail) {
                $message->to($userEmail)
                    ->subject('Password reset');
            });


            return back()->with('status', 'We have e-mailed your password reset link!');
        }
        else return back()->with('error', 'We can\'t find a user with that e-mail address.');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    protected function broker()
    {
        return Password::broker();
    }
}
