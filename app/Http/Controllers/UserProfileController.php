<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Session;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        if (Sentinel::guest()) { //instead of $this->auth->guest()

            return redirect()->guest('alogin');
            
        }
    }


    public function index()
    {
        return view('public.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $id = Sentinel::getUser()->id;
        $user = Sentinel::findById($id);
        if(isset($data["password"])){
            if($data["password"] ==  $data["repassword"]){

  Sentinel::update($user, ['password' => $data["repassword"],'first_name' => $request->first_name,
                'last_name' => $request->last_name]);


              $msg = "profile is updated";
              Session::flash('success', $msg);
              return redirect()->back();
          }else{
            $msg = "Password is not match";
            Session::flash('error', $msg);
            return redirect()->back();

        }
    }
    else{
       
  Sentinel::update($user, ['first_name' => $request->first_name,
                'last_name' => $request->last_name]);
       $msg = "profile is updated";
       Session::flash('success', $msg);
       return redirect()->back();
   }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
