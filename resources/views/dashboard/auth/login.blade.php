@extends('layouts.dashboard.auth')
@section('title')
Login
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="{{asset('asset/dashboard')}}/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>{{__('auth.login')}}</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="{{route('dashboard.login.post')}}" method="POST" class="form-horizontal" action="index.html" novalidate>
                        @csrf
                        <fieldset class="form-group position-relative has-icon-left">
                        <input name="email" type="text" class="form-control input-lg" id="user-name" placeholder="{{__('auth.enter_your_email')}}"
                        tabindex="1">
                        @error('email')
                            <strong class="text-danger">{{"$message"}}</strong>
                        @enderror
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input name="password" type="password" class="form-control input-lg" id="password" placeholder="{{__('auth.enter_your_password')}}"
                        tabindex="2" >
                        @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <br>
                        <fieldset class="form-group position-relative has-icon-left">
                            <div style="justify-content: center;display: flex;">
                                {!! NoCaptcha::display() !!}


                        </fieldset>
                        @error('g-recaptcha-response')
                        <strong class="text-danger justify-content: center;display: flex;">{{ $message }}</strong>
                        @enderror
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <input name="remember" type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me">{{__('auth.remember_me')}}</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-right"><a href="{{route('dashboard.password.email')}}" class="card-link">{{__('auth.forget_password')}}</a></div>
                      </div>
                      <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> {{__('auth.login')}}</button>
                    </form>

                  </div>
                </div>
                <div class="card-footer border-0">
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">

                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <br><br>
  </div>
@endsection
