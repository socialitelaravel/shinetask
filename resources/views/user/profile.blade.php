@extends('layouts.app')

@section('content')
            <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">


                    <h1>Edit Profile</h1>
                    <hr>
                    <form action="{{url('updateProfile')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
                        @csrf

                            <div class="row">
                        <!-- left column -->
                        <div class="col-md-3">
                            <div class="text-center">
                                <p><input type="file" class="form-control" accept="image/*" name="image" id="file"   onchange="loadFile(event)"></p>


                        <div>
                        <?php if(isset($user->profile->image)){ ?>
                            <p><img src="{{Storage::disk('avatars')->url($user->profile->image)}}" id="output" width="200" /></p>
                            <?php }else{ ?>
                                    <p><img src="" id="output" width="200" /></p>
                            <?php } ?>
                            @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                        </div>

                            </div>
                        </div>

                        <!-- edit form column -->
                        <div class="col-md-9 personal-info">


                                <!-- For alert message -->
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{{ Session::get('message') }}</li>
                                        </ul>
                                    </div>
                            @else
                                <div class="alert alert-info alert-dismissable">
                                    <a class="panel-close close" data-dismiss="alert">×</a>
                                    <i class="fa fa-coffee"></i>
                                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                                </div>
                            @endif

                            <!-- End Alert Message -->


                            <h3>Personal info</h3>
                            <div class="form-group">
                                    <label class="col-lg-3 control-label">Name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="email" name="email"  value="{{$user->email}}" readonly>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Change Password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm password:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="password" name="confirm_password">
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone Number:</label>
                                        <div class="col-md-8">
                                        <input class="form-control" type="number" value="{{$user->profile->phone_number}}" name="phone_number">
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif

                                        </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="address" value="{{$user->profile->address}}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <input type="hidden"  name="id" value={{Auth::user()->id}}>

                                    <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- End of Main Content -->

                <!-- Footer -->
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            <script>
    if ($("#contact_form").length > 0) {
        $("#contact_form").validate({
 
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
 
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                },
                
                
                phone_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 12,
                },

                message: {
                    required: true,
                    minlength: 50,
                    maxlength: 500,
                },
            },
            messages: {
 
                password: {
                    required: "Please enter password",
                },
                
               
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
 
            },
        })
    } 
 </script>



@endsection
