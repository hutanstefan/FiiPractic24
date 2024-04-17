<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use Carbon\Carbon;

class TokenController extends Controller
{

    public function validateToken($tokenString)
    {
        $token = Token::where('token', $tokenString)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        return $token ? true : false;
    }

    public function deleteToken($tokenString)
    {
        Token::where('token', $tokenString)->delete();
        return response()->json(['message' => 'Token deleted']);
    }
}
