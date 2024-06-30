<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'account_name' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('account_name', 'password');

        if (Auth::attempt(['account_name' => $credentials['account_name'], 'password' => $credentials['password']], $request->remember)) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('/'));
        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('account_name', 'remember'))->withErrors([
            'account_name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
