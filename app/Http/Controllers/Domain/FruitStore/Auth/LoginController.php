<?php

namespace App\Http\Controllers\Domain\FruitStore\Auth;

use App\Events\LoginHistory;
use App\Http\Controllers\Controller;
use App\Jobs\Users\ProcessUserLogin;
use App\Models\User;
use App\Models\CategoryPost;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('home.index');
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except(['logout','checkLoginAjax']);
    }

    public function guard()
    {
        return Auth::guard('web');
    }
    public function checkLoginAjax(){
        if(Auth::check()){
            return response()->json([
                "code" => 200,
                'data'=>true,
                "message" => "success"
            ], 200);
        }else{
            return response()->json([
                "code" => 200,
                'data'=>false,
                "message" => "success"
            ], 200);
        }
    }

    public function profile()
    {
        /** @var User $user */
        $user = Auth::guard('web')->user();
        if ($user == false) {
            return redirect(route('FruitStore.fruitStoreLogin'));
        }
        $idUser = $user->id;
        $breadcrumbs = [
            [
                'name' => __('home.lien_he'),
                'slug' => makeLinkToLanguage('contact', null, null, \App::getLocale()),
            ],
        ];

        $data = [
            'userLogin' => $user,
            'breadcrumbs' => $breadcrumbs,
            'typeBreadcrumb' => 'contact',
            'title' => "Thông tin liên hệ",

            'seo' => [
                'title' => "Thông tin liên hệ",
                'keywords' => "Thông tin liên hệ",
                'description' => "Thông tin liên hệ",
                'image' => "",
                'abstract' => "Thông tin liên hệ",
            ],
        ];

        return view('domain.fruitstore.page.profile', $data);
    }


    /*
     * Update profile
     * */
    public function profileUpdate(Request $request)
    {
        //
        $input = $request->all();
        $userLogin = Auth::guard('fruit')->user();
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($userLogin->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        //Save thumbnail
        if (isset($input['thumbnail'])) {
            $user->thumbnail_path = $input['thumbnail']['path'];
            $user->thumbnail_base_url = $input['thumbnail']['base_url'];
        }

        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        $dataParam = [
            'save_flg' => 1,
            'send_job' => 1
        ];

        return redirect(route('FruitStore.fruitStoreUserProfile', $dataParam))
            ->with('success', 'Cập nhật thành công!');
    }

    public function showLoginForm()
    {
        // $lang = App::getLocale();
        //dd(Hash::make('123'));
        // $categoryPost=new CategoryPost();

        // /* if (Auth::guard('admin')->check()) {
        //      return redirect($this->redirectTo);
        //  }*/
        // //dd(bcrypt(123));
        // $menuNew=[];
        // $listCategoryPost=$categoryPost->select(['parent_id','id'])
        // ->with(['translationsLanguage'])->whereIn(
        //     'id',[1,75]
        // )->orderby('order')->get();

        // $dataCategoryPost=$categoryPost->select(['parent_id','id'])->with(['translationsLanguage'])->where('active',1)->orderby('order')->latest()->get();
        // foreach ($listCategoryPost as $parent) {
        //     array_push($menuNew,$categoryPost->getALlModelCategoryChildrenAndSelf($parent,null,$dataCategoryPost));
        // }

        // $menuNewGt=[];
        // $listCategoryPost=$categoryPost->select(['parent_id','id'])
        // ->with(['translationsLanguage'])->whereIn(
        //     'id',[59]
        // )->orderby('order')->get();

        // foreach ($listCategoryPost as $parent) {
        //     array_push($menuNewGt,$categoryPost->getALlModelCategoryChildrenAndSelf($parent,null,$dataCategoryPost));
        // }

        

        // $header['menu']=[
        //     [
        //         'name'=> 'Trang chủ',
        //         'slug_full'=>makeLink('home'),
        //         'childs'=>[
        //         ]
        //     ],
        //     ...$menuNewGt,
        //     // ...$menuP,
        //     ...$menuNew,
        //     // [
        //     //     'name'=>__('home.gioi_thieu'),
        //     //     'slug_full'=>makeLinkToLanguage('about-us',null,null,$lang),
        //     //     'childs'=>[
        //     //     ]
        //     // ],
        //     [
        //         'name'=>__('home.lien_he'),
        //         // 'slug_full'=>makeLinkToLanguage('contact',null,null,$lang),
        //     ],
        // ];
        

        //dd($header);
        $data = [
            'seo' => []
        ];

        return view('domain.fruitstore.auth.login', 
            $data,

        );
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
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $userData = User::query()
            ->where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();

        if ($userData){
            Auth::guard('web')->login($userData);
            $user = Auth::guard('web')->user();
            //event(new LoginHistory($user));
            //ProcessUserLogin::dispatch($user);
            // dd('test');
            if ($user) {
                //dd('a');
                return response()->json([
                    'code' => 200,
                    'messange' => 'success',
                    'validate' => false
                ], 200);
            }else{
                $validator->getMessageBag()->add('email', 'Tài khoản hoặc mật khẩu không đúng');

                return response()->json([
                    'code' => 200,
                    'messange' => 'error',
                    'validate' => true
                ], 200);
            }
        }else{
            return response()->json([
                'code' => 200,
                // 'htmlErrorValidate' => view('admin.components.load-error-ajax', [
                //     "errors" => $validator->errors()
                // ])->render(),
                'messange' => 'error',
                'validate' => true
            ], 200);
        }

        

        // $this->incrementLoginAttempts($request);

        // return $this->sendFailedLoginResponse($request);
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
        $this->guard('web')->logout();
        Auth::logout();
        dd(Auth::logout());
        #remove session save time login
        $request->session()->invalidate();

        return redirect(route('adminLogin'));
    }

    public function username()
    {
        return 'email';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [
            'login' => 'Sai thông tin đăng nhập.'
        ];
        
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'password', 'remember'))
            ->with('alert', $errors['login']);
    }
}
