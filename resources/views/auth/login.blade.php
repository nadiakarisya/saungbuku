@extends('layout.' . config('view.theme') . '.login')

@section('content')
    <div class="box1">
        <div class="text-center">
            <img src="{{ url('joshadmin/images/josh-new.png') }}" alt="logo" class="img-fluid mar"></div>
        <h3 class="text-primary">Log In</h3>
        <!-- Notifications -->
        <div id="notific">
        </div>
        @if(!config("auth.sso"))
            <form action="{{url("login")}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-12">
                        <label for="emailaddress">Email address / Username</label>
                        <input class="form-control" name="username" type="text" id="emailaddress" required placeholder="Enter your email / Username" tabindex="1">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password" tabindex="2">
                        <span class="input-group-btn">
                            <button class="btn btn-block btn-custom" type="button" id="show">
                                <i class='{{ config('view.theme') ? 'fa fa' : 'entypo' }}-eye'></i>
                            </button>
                        </span>


                        </div>
                        <div class="icon-left"></div>
                    </div>
                </div>

                @if(Session::has("error"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Username / Password salah !
                    </div>
                @endif

                <div class="form-group text-center m-t-10">
                    <div class="col-12">
                        <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 text-center social_login m-t-10 mb-3">
                        <a class="btn btn-block btn-social btn-facebook" href="http://demo.joshadmin.com/facebook">
                            <i class="fa fa-facebook"></i> Sign in with Facebook
                        </a>
                        <a class="btn btn-block btn-social btn-google-plus" href="http://demo.joshadmin.com/google">
                            <i class="fa fa-google-plus"></i> Sign in with Google
                        </a>
                        <a class="btn btn-block btn-social btn-linkedin" href="http://demo.joshadmin.com/linkedin">
                            <i class="fa fa-linkedin"></i> Sign in with LinkedIn
                        </a>
                    </div>
                </div>
            </form>
        @endif
    </div>
    <div class="bg-light animation flipInX">
        <a href="#" id="forgot_pwd_title">Forgot Password?</a>
    </div>

@endsection