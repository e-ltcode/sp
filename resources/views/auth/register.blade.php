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
                <h3 >{{ __('Register') }} Now</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="">{{ __('Name') }}</label>
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px">

                            <div class="form-group col-md-6  mb-0">
                                <div class=" ">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <a href="{{ url('auth/google') }}" style="" class="form-group btn btn-block btn-success ">
                                  <strong>Sign Up With Google</strong>
                              </a> 
                          </div>

                          <div class="form-group col-md-6  mb-0">
                                <div class=" ">
                                    Already Have an Account?
                                </div>
                            </div>
                            <div class="form-group col-md-6 text-right mb-0" >
                                <a href="{{ url('/login') }}" style="color: #9d43ac"><b>Login Now</b></a>
                          </div>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
