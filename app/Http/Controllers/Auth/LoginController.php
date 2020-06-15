<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Entity\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
       return view('auth.login');
    }

    public function login(LoginRequest $request)
    {

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $authenticate = Auth::attempt(
            $request->only(['email', 'password']),
            $request->filled('remember')
        );
        if ($authenticate) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            $user = Auth::user();

            if ($user->isWait() ) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Вам нужно активировать акк. Проверьте почту\email.');
            }
            if($user->isAdmin() ) {
                return redirect()->route('admin.home');
            }
            if(false === $user->isAdmin() ) {
                return redirect()->route('home');
            }

        }
        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


}
