<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisteredUserController extends Controller
{
    public function store(Request $request, CreatesNewUsers $creator)
    {
        $user = $creator->create($request->all());

        Auth::login($user);

        return redirect('/register/step2');
    }

}
