<?php

namespace App\Http\Controllers\Domain\FruitStore\Auth;

use App\Dictionaries\AppDomain;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'seo' => []
        ];
        return view('domain.fruitstore.auth.register', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            
            
            $password = '123';
            if ($request->input('password')) {
                $password = $request->input('password');
                
            }
            
            
            /** @var User $user */
            $user = User::create([
                'name' => $request->name,
                'username' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);
    
            
    
            $user->save();
    
            event(new Registered($user));
            ///Todo send email
    
            //Login
            //Auth::guard('admin')->login($user);
            $dataParam = [
                'send_job' => 1
            ];
            event(new Registered($user));
            // $this->guard()->login($user,false);
            return response()->json([
                'code' => 200,
                'data' => '',
                'messange' => 'success',
                'validate' => false
            ], 200);
        }catch (\Exception $exception) {
            //dd($exception);
            return response()->json([
                'code' => 200,
                'messange' => 'error',
                'validate' => true
            ], 200);
            // DB::rollBack();
            // Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            
        }
        
        
        

        
        // return redirect(route('FruitStore.fruitStoreLogin', $dataParam));
        //return redirect()->intended('/')->with('alert', 'Cập nhật thành công!');
    }
}
