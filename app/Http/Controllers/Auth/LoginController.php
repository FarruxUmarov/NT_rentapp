<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'phone'    => ['required', 'numeric', 'min_digits:9', 'exists:users,phone'],
            'password' => ['required', Rules\Password::defaults(), 'exists:users,password'],
        ]);

        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with('error', 'Wrong phone number or password');
    }
}
