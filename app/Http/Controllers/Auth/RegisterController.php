<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:20'],
            'genre' => ['required', 'in:homme,femme', 'max:20'],
            'email' => ['required', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'alpha_num', 'min:6'],
            'age' => ['required','numeric','min:23'],
            'telephone' => ['required', 'string', 'max:10','min:10'],
            'adresse' => ['required', 'alpha_num', 'max:50'],
            'ville' => ['required', 'string', 'max:20'],
            'cin' => ['required', 'alpha_num', 'max:10'],
            'permis' => ['required', 'alpha_num', 'max:10'],
        ]);

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
    protected function create(array $data)
    {
        return User::create([
            'name' => strtolower($data['name']),
            'prenom' => strtolower($data['prenom']),
            'email' => strtolower($data['email']),
            'password' => Hash::make($data['password']),
            'genre' => strtolower($data['genre']),
            'age' => strtolower($data['age']),
            'adresse' => strtolower($data['adresse']),
            'ville' => strtolower($data['ville']),
            'telephone' => strtolower($data['telephone']),
            'cin' => strtolower($data['cin']),
            'permis' => strtolower($data['permis']),
            'image_path'=> (strtolower($data['genre']) === 'homme') ? 'profile5.jpg' : 'profile_femme.jpg',
        ]);

        // event(new Registered($user));

        // return $user;

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
