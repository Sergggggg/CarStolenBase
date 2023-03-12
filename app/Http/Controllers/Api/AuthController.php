<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\JsonResponseFormat;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use JsonResponseFormat;

    protected $token_name = 'api-auth';

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation errors', 422);
        }

        $user = User::query()->where('email', $request->email)->first();
        if(!$user){
            return $this->error('User not found', 404);
        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->error('Forbidden', 403);
        }

        $user->tokens()->where('name', $this->token_name )->delete();
        $tokenResult = $user->createToken($this->token_name)->plainTextToken;

        return $this->success([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
        ],  'New token created.');
        
    }
}


