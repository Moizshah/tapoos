<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Session,Activation,Validator,Reminder;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Sentinel;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    public function registerUser(Request $request){

     $data = $request->all();

         $credentials = [
            'email' => $data['email']
        ];
        $userExisted = Sentinel::findByCredentials($credentials);
        if ($userExisted) {

            Session::flash('error', 'user is already register');
           return redirect()->back();

        } else {
            $user = Sentinel::registerAndActivate([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'permissions' => [
                    'user.delete' => 0,
                ]
            ]);
            $role = Sentinel::findRoleByName('User');
            $role->users()->attach($user);
            $public_id = uniqid();
            //$userInfo = new UserInfo();

         //   $userInfo->user_id = $user->id;
         //   $userInfo->public_id =  $public_id;
         //   $userInfo->gender = 1;

            // try {
            //    // $userInfo->save();
               
            // } catch (QueryException  $e) {

            //       $ex->getMessage();
            // }

            // create a new activation for the registered user
            $activation = (new \Cartalyst\Sentinel\Activations\IlluminateActivationRepository)->completed($user);
     
          
            if (!$activation)
            {
                Session::flash('error' , "Wrong information provided. Pleae contact system Administrator.");

                return redirect()->back();

            } else {

                $msg = 'Your account has been activated. Please setup your password.';
                Session::flash('success' , $msg);
                          return redirect()->back();

            }

    
    

        }

    }






}
