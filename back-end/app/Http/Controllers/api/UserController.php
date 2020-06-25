<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


/**
 * Códigos HTTP que podem ser usados
 *
 * Sucesso:
 * 200 – OK – Eyerything is working
 * 201 – OK – New resource has been created
 * 204 – OK – The resource was successfully deleted
 *
 * Erro:
 * 400 – Bad Request – The request was invalid or cannot be served. The exact error should be explained in the error payload. E.g. „The JSON is not valid“
 * 401 – Unauthorized – The request requires an user authentication
 * 403 – Forbidden – The server understood the request, but is refusing it or the access is not allowed.
 * 404 – Not found – There is no resource behind the URI.
 * 422 – Unprocessable Entity – Should be used if the server cannot process the enitity, e.g. if an image cannot be formatted or mandatory fields are missing in the payload.
 */

/**
 * Metodo para devolver resposta de sucesso.
 *
 * @param  $dados, os dados que serão retornados para o cliente
 * @param  $mensagem, mensagem
 * @param  $codigo, código http a ser retornado
 * @return \Illuminate\Http\Response
 */

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Unsuccessful Login due to missing credentials',
                'error' => $validator->errors()

            ], 400);

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
        ], 400);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Unsuccessful Register due to missing credentials',
                'error' => $validator->errors()
            ], 400);

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

    public function user(Request $request)
    {
        if ($request->user() == null)
            return response([
                'message' => 'User not found'
            ], 400);
        return response([
            'message' => 'User found',
            'user' => $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {
        if ($request->user() == null)
            return response([
                'message' => 'User not found'
            ], 400);

        $request->user()->token()->revoke();

        return response([
            'message' => 'User logged out',
        ], 200);
    }
}
