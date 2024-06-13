<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Process the login form submission.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:1',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('read');
                case 'user':
                    return redirect()->route('index');
                case 'pengawas':
                    return redirect()->route('pengawas');
                default:
                    return redirect()->route('login'); // Sesuaikan dengan rute default
            }
        }

        return back()->withErrors([
            'name' => 'Nama atau password salah.',
        ]);
    }

    /**
     * Process the registration form submission.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:1|confirmed',
            'role' => 'required|in:admin,user,pengawas',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        Auth::login($user);

        // Redirect berdasarkan peran pengguna
        switch ($user->role) {
            case 'admin':
                return redirect()->route('read');
            case 'user':
                return redirect()->route('index');
            case 'pengawas':
                return redirect()->route('pengawas');
            default:
                return redirect()->route('login'); // Sesuaikan dengan rute default
        }
    }
}
