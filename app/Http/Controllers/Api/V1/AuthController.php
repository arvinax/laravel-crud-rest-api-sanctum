<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

      

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        
        $token = $user->createToken('tokens')->plainTextToken;

        $response = [
            'user' => $user,
            'remeber_token' => $token
        ];

      
        return response($response, 201);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return  [
            'message' => 'logged out'
        ];
    }


    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

       // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password 
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'invalid information'
            ], 401);
        }

        $response = [
            'user' => $user,
            'token' => $user->createToken('tokens')->plainTextToken
        ];
       
        return response($response, 201);
    }
}
