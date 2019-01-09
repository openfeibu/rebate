<?php

namespace App\Http\Controllers\Wap\Auth;

use App\Http\Controllers\Wap\Controller;
use App\Traits\RoutesAndGuards;
use App\Traits\Account\Auth\AuthenticatesUsers;
use App\Traits\Theme\ThemeAndViews;
use Illuminate\Foundation\Validation\ValidatesRequests;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Response\Auth\Response as AuthResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use RoutesAndGuards,ThemeAndViews, ValidatesRequests, AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->response   = resolve(AuthResponse::class);
        $this->middleware('guest:user.web', ['except' => ['logout', 'verify']]);
        $this->setTheme();
    }
    /*
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect($this->redirectTo);
    }
    */

    public function showLoginForm()
    {
        $guard = $this->getGuardRoute();

        return $this->response
            ->title('登陆')
            ->layout('auth')
            ->view('auth.login')
            ->data(compact('guard'))
            ->output();
    }
    public function login(Request $request)
    {
        // 规则
        $rules = [
            'Accounts' => 'required',
            'password' => 'required'
        ];

        // 自定义消息
        $messages = [
            'Accounts.required' => '请输入账号',
            'password.required' => '请输入密码'
        ];

        $this->validate($request, $rules, $messages);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
