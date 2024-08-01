<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /*
      - Autenticando Login
    */
    public function login(LoginRequest $request)
    {

        $token = auth()->attempt($request->validated());

        if($token){
            return $this->responseWithToken($token, auth()->user());
        }else{
            return response()->json([
                'status' => 'erro',
                'message' => 'Dados inválidos!'
            ], 401);
        }
        
    }

    /*
     - Cadastro de Email e Senha
    */
    public function register(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        if($user){
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        }else{
            return response()->json([
                'status' => 'erro',
                'message' => 'Ocorreu um erro na tentativa de criar um usuário!'
            ], 500);
        }

    }

    public function responseWithToken($token, $user){
        
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);

    }

}
