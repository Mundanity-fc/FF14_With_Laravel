<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request) {
        $result = false;
        $message = '';
        $user = [];
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $result = true;
        } else {
            $message = 'EmailまたはPasswordが間違っています。';
        }
        return response()->json(['result' => $result, 'message' => $message]);
    }


    public function logout(Request $request) {
        $result = true;
        $message = 'ログアウトしました。';
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['result' => $result, 'message' => $message]);
    }


    public function auth() {
        $result = false;
        $user = [];
        if (Auth::check()) {
            $user = \Auth::user();
            $result = true;
        }
        return response()->json(['result' => $result, 'user' => $user]);
    }
}
