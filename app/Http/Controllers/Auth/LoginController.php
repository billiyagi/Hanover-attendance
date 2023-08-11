<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Present;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectToRoute = '/admin/dashboard';

    /**
     * Login page.
     */
    public function login()
    {
        // Check if user already logged in
        if (Auth::check()) {
            return redirect()->to($this->redirectToRoute);
        }

        return view('auth.login');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {

        /**
         * Check validation
         */
        $credentials = $request->validated();

        /**
         * Check User Credentials
         */
        if(Auth::attemptWhen($credentials, function ($user) {
            return Present::getAttendanceId($user->id) != false || $user->role_id == 1;
        })) {
            $request->session()->regenerate();
            notify()->success('Welcome Back!', 'Login Success');
            return redirect()->intended($this->redirectToRoute);
        } else {
            return back()->withErrors([
                'nip' => 'Anda belum terdaftar pada sistem absensi.',
            ])->onlyInput('nip');
        };

        /**
         * If user credentials not match
         */
        return back()->withErrors([
            'nip' => 'NIP/Password Salah, Silahkan Coba Lagi.',
        ])->onlyInput('nip');
    }
}
