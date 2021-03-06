<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use App\SocialProvider;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $newUser =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //create Setting for new User
        Setting::create([
            'user_id' => $newUser->id,
            'current_team_id' => 0
        ]);

        return $newUser;
    }

    //
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider1($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback1($provider)
    {
        try{
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e){
            return redirect('/');
        }
       
        //check if we have log provider
        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        
        if(!$socialProvider){
            //create a new user and provider
            $user =User::firstOrCreate([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => Hash::make('password'),
            ]);

            
        //create settings for new user(google)
            Setting::firstOrCreate([
                'user_id' => $user->id,
                'current_team_id' => 0
            ]);
         
            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );
        }
        
        else
            $user = $socialProvider->user;
        
        auth()->login($user);
        return redirect('/home');
    }
}
