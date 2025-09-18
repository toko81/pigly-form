<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WeightLog;

class RegisterController extends Controller
{
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

    public function step2Form()
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
