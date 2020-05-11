<?php

namespace App\Http\Controllers\Web\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProfileRequest;
use App\Providers\RouteServiceProvider;
use App\ShippingDetail;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the application registration form. (override laravel default)
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('website.pages.register');
    }

    /**
     * Handle a registration request for the application. (override laravel default)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(ProfileRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    // not laravel default for register, logic taken from laravel defaults of login (AuthenticatesUsers trait)
                    : redirect()->intended($this->redirectPath())->withSuccess([
                        'title' => 'Thank you!',
                        'description' => 'You have registered succesfully',
                    ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 1, // user role
        ]);

        $shippingDetail = new ShippingDetail([
            'country' => $data['country'],
            'governorate' => $data['governorate'],
            'city' => $data['city'],
            'address' => $data['address'],
            'building' => $data['building'],
            'floor' => $data['floor'],
            'apartment' => $data['apartment'],
            'mobile' => $data['mobile'],
            'landline' => $data['landline'],
        ]);

        $user->shippingDetail()->save($shippingDetail);

        return $user;
    }
}
