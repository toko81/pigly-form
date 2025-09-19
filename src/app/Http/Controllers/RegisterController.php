<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Http\Requests\LoginRequest; 
use App\Models\User;


class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('register.step1');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('weight_logs.index');
        }

        return back()->withErrors([
            'email' => '認証に失敗しました。メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
    }

    public function step1Store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('register.step2');
    }


    public function step2()
    {
        return view('register.step2');
    }

    public function step2Store(Request $request)
    {
        $request->validate([
            'current_weight' => 'required|numeric|min:0',
            'target_weight' => 'required|numeric|min:0',
        ]);

        WeightLog::create([
            'user_id' => auth()->id(),
            'current_weight' => $request->current_weight,
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('weight_logs.index')->with('success', '体重データを登録しました');
    }

}
