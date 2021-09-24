@extends('layouts.header')


<style type="text/css">
  .card{
    margin-top: 100px;
    padding: 40px;
}
h3{
    font-family: "Roboto",sans-serif;
    text-align: center;
}
.form-group label{
    margin-bottom: .5rem;
}

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h3 >Login Now</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                               @if (Route::has('password.request'))
                               <a class="" style="font-size: 15px;" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('auth/google') }}"  class="btn  btn-success btn-block">
                              <strong>Login With Google</strong>
                          </a> 
                        </div>

                        <div class="form-group col-md-6  mb-0">
                                <div class=" ">
                                    Not Have an Account?
                                </div>
                            </div>
                            <div class="form-group col-md-6 text-right mb-0" >
                                <a href="{{ url('/register') }}" style="color: #9d43ac"><b>Register Now</b></a>
                          </div>
                    </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection