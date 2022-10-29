<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $error = '错误';
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => '请输入邮箱',
            'password.required' => '请输入密码',
        ]);
        if ($validator->fails()) {
            return response()->json($this->error($validator->errors()->first()), 200, [], \JSON_PRETTY_PRINT);
        }
        $user = User::where('email', '=', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json($error, 200, [], \JSON_PRETTY_PRINT);
        }
        // 发行令牌
        $token = $user->createToken('console-token')->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($data, 200, [], \JSON_PRETTY_PRINT);
    }
}
