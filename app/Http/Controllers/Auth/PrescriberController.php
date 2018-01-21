<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Prescriber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\PrescribersUsers;

class PrescriberController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Subscriber Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the prescribtion of new prescribers as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Show the application prescriber form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubscriberForm()
    {
       
        return view('auth.prescriber');
    }

     /**
     * Handle a subscriber request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prescriber(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($prescriber = $this->create($request->all())));

        $this->guard()->login($prescriber);

        return $this->registered($request, $prescriber)
                        ?: redirect($this->redirectPath());
    }

     /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $prescriber)
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'npi' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:10',
            'phone_extension' => 'required|string|max:4',
        ]);
    }

    /**
     * Create a new prescriber instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Prescriber
     */
    protected function create(array $data)
    {
        $data['role'] = 'uui';
        $data['is_admin'] = '0';

        return Prescriber::create([
            'npi' => $data['npi'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'phone_extension' => $data['phone_extension'],
            'fax' => $data['fax'],
            'role' => $data['role'],
            'is_admin' => $data['is_admin'],
        ]);
    }
}
