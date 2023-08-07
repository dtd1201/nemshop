<?php

namespace App\Http\Controllers\Crater\Auth;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'sale/dashboard';

    protected $maxAttempts = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->redirectTo = config('sale.home_page');

        //  $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('web');
    }


    public function showLoginForm()
    {
        /* if (Auth::guard('sale')->check()) {
             return redirect($this->redirectTo);
         }*/
        //dd(bcrypt(123));

        return view('admin.crater.auth.login');
    }

    public function showSignupForm()
    {
        /* if (Auth::guard('sale')->check()) {
             return redirect($this->redirectTo);
         }*/
        //dd(bcrypt(123));

        return view('admin.crater.auth.sign-up');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        //dd($request->input());
        $this->validateLogin($request);

        /*if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }*/

        //todo check only role sale can login
        if ($this->attemptLogin($request)) {
            #session save time login
            $user = User::query()->first();
            Auth::guard('web')->login($user);

            $sale_lifetime = date('Y-m-d H:i:s');
            $request->session()->put('sale_lifetime', $sale_lifetime);

            //return $this->sendLoginResponse($request);
            return redirect(route('sale.saleDashboaard'))->with('success', 'Đăng nhập thành công!');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $dataLogin = ['role' => 'admin'];

        $dataLogin = array_merge($request->only($this->username(), 'password'),);

        return $dataLogin;
    }

    public function logout(Request $request)
    {
        //$this->guard('sale')->logout();
        Auth::logout();
        #remove session save time login
        $request->session()->invalidate();

        return redirect(route('saleLogin'));
    }

    public function username()
    {
        return 'email';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [
            'login' => 'Thông tin đăng nhập không hợp lệ.'
        ];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'password', 'remember'))
            ->with('warning', $errors['login']);
    }
}
