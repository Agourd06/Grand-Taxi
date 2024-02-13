<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $data = $request->validate([
        'logname' => 'required',
        'logpassword' => 'required'
    ], [
        'logname.required' => 'Name is required for login',
        'logpassword.required' => 'Password is required for login'
    ]);

    if (auth()->attempt(['name' => $data['logname'], 'password' => $data['logpassword']])) {

        $authenticatedUser = auth()->user();

        if ($authenticatedUser->chauffeur) {
            return redirect('/chauffeur');
        }

        if ($authenticatedUser->passager) {
            return redirect('/passager');
        }

        if ($authenticatedUser->admin) {
            return redirect('/admin');
        }

    } else {
        return redirect('/')
        ->withErrors(['login' => 'Invalid credentials'])
        ->withInput();           
    }
}
public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
