<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Sentinel;
use Session,Activation,Validator,Reminder;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\EmailController;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginIn(){


       try
       {
            $input = Input::all();
           $rules = [
               'email'    => 'required',
               'password' => 'required',
           ];
           
           $validator = Validator::make($input, $rules);
           if ($validator->fails())
           {
               $msg = "Data is not validated";

               Session::flash('error', $msg);
               return redirect()->back();


           }

            $remember = (bool) Input::get('remember', false);

            $credentials = [
                'email'    => $input['email'],
                'password' => $input['password'],
            ];

            if (Sentinel::authenticate($credentials , $remember))
            {

                return redirect('/');

            }

        }

       catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e)

       {


           $msg = "Your Account is not acitavied please check your email.";
           Session::flash('error', $msg);
           return redirect()->back();


       }


       catch ( \Cartalyst\Sentinel\Checkpoints\ThrottlingException $e)
       {


           $delay = $e->getDelay();
           $msg = "Your account is blocked for {$delay} second(s).";

           Session::flash('error', $msg);
          return redirect()->back();


       }

       $msg = "Invalid email or password.";
       Session::flash('error', $msg);
       return redirect()->back();


    }
     public function logout()
    {
        Sentinel::logout();

        if(isset($msg)){

            Session::flash('success' , $msg);
     
        }
        else{
            Session::flash('success' , "You are Logged out. ");
        }
           return redirect('/login');
      
    }
}
