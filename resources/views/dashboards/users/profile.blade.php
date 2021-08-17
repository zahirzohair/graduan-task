@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Profile')

@section('content')

    <div class="container">
        <form action="{{url('user/update-profile-info')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters" style="padding-top: 20px;">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                    </div>
                                    <h5 class="user-name">{{Auth::user()->name}}</h5>
                                    <h6 class="user-email">{{Auth::user()->email}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Change Password</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Current Password</label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Enter current password">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">New Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">Re-enter Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter new password">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">Image</label>
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                </div>


                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

@endsection
