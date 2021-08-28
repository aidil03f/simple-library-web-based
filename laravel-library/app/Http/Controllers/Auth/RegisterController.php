<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    
    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => ['required','min:3'],
            'email' => ['required','unique:users,email'],
            'password' => ['required','min:5']
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response('Thanks, you are registered.');
    }
}
