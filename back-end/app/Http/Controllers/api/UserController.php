<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Unsuccessful Login due to missing credentials',
                'error' => $validator->errors()
            ], 401);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // User without token 
            $token = $user->getRememberToken();
            if (!$token)
                $token = $user->createToken('web')->accessToken;

            $response['token'] = $token;
            $response['user'] = $user;

            return response([
                'message' => 'Successful Login',
                'data' => $response
            ], 200);
        }

        return response([
            'message' => 'Unsuccessful Login due to invalid credentials'
        ], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Unsuccessful Register due to missing credentials',
                'error' => $validator->errors()
            ], 401);

        $credentials = $request->only('name', 'email', 'password');
        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        $response['token'] = $user->createToken('web')->accessToken;
        $response['user'] = $user;
        return response([
            'message' => 'Successful Register',
            'data' => $response
        ], 200);
    }
}
