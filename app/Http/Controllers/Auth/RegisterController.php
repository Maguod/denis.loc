<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Entity\User;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\RegisterService;

use Illuminate\Foundation\Auth\RegistersUsers;


//use Mail;
use Request;

class RegisterController extends Controller
{

    use RegistersUsers;


    private $service;

    public function __construct(RegisterService $service)
    {
//        $this->middleware('can:admin-panel');
        $this->middleware('guest');
        $this->service = $service;
    }

    public function showRegistrationForm()
    {
       return view('auth.register');
    }

    protected function register(RegisterRequest $request)
    {

        $this->service->register($request->all());
        \Auth::logout();

        return redirect()->route('login')
            ->with('success', 'Check your email and click on the link to verify.');
    }

    public function verify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login')
                ->with('error', 'Sorry your link cannot be identified.');
        }

        try {
            $this->service->verify($user->id);
            return redirect()->route('login')
                ->with('success', 'Вы подтвердили email, можете залогиниться.');
        } catch (\DomainException $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }


    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect()->route('login')
            ->with('success', 'Проверьте почту и перейдите по ссылке для активации');
    }
}
