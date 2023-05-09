<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash, Session, DB;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $roles = Role::all();
        return view('myauth.login', compact('roles'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {   
        $request->validate([
            'role' => 'required',
            'login' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::where('email', $request->login)
                    ->orWhere('nip', $request->login)
                    ->first();
                
        if ($user && Hash::check($request->password, $user->password) && $user->hasRole($request->role)) {
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME); 
        } else {
            return redirect()->back()->with('msg_error', 'Login Failed');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
