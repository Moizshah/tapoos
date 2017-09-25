@extends('public.layout.app')
@section('breadcrumb')
    <ul class="page-breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li>My Profile</li>
                    </ul>
                    @stop
@section('content')
<div class="row">

    <div class="col-md-8 col-sm-8">
        <div class="portlet-body form">
           
            <form class="login-form" action="{{url('/')}}/userprofile/{{Sentinel::getUser()->id}}" method="post" >
              @include('shared.errors')
              <input name="_method" type="hidden" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />        
              <div class="form-body">

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{Sentinel::getUser()->first_name}}" placeholder=""> 
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{Sentinel::getUser()->last_name}}" placeholder=""> 
                </div>
                <!-- <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{Sentinel::getUser()->email}}" placeholder=""> 
                </div> -->
                <div class="form-group">
                    <h3>Change Password</h3>
                    <p class="help-block">
                        <i>To change password you need to enter your current password.</i>
                    </p>
                </div>
               <!--  <div class="form-group">
                    <label>Current Password</label>
                    <input type="text" class="form-control" name="" placeholder=""> 
                </div> -->
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password" placeholder=""> 
                    <p class="help-block">
                        <i>Enter a strong password that contains at least 8 characters.</i>
                    </p>
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control" name="repassword" placeholder=""> 
                </div>

            </div>
            <div class="form-actions right">

                <button type="submit" class="btn green">Update</button>
            </div>
        </form>
    </div>
</div>
</div>

@stop