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
            return response()->json($validator->messages(), 200, [], \JSON_PRETTY_PRINT);
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

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:32'
        ];
        $input = $request->only('name','email','password', 'password_confirmation');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200, [], \JSON_PRETTY_PRINT);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json('成功注册', 200, [], \JSON_PRETTY_PRINT);
    }
}
