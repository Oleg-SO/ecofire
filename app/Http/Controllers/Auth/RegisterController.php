<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/checkout ';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
        
    // }

    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required'
        ], [
            'g-recaptcha-response.required' => 'Подтвердите, что вы не робот!'
        ]);
    
        $validator->after(function ($validator) {
            $response = (new Client)->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => '6LfEMtIlAAAAAKkJiHF0xlXbJI_h2yqPWHNFYNXd',
                    'response' => request('g-recaptcha-response'),
                    'remoteip' => request()->ip()
                ]
            ]);
    
            $responseData = json_decode($response->getBody(), true);
    
            if (!$responseData['success']) {
                // Капча не прошла проверку
                return redirect()->back()->withErrors(['g-recaptcha-response' => 'Подтвердите, что вы не робот!']);
            }
            
            // Капча прошла проверку
            // Дальнейшая обработка формы
            
        });
    
        return $validator;
    }
    
    
    
        
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
