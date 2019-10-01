@extends('layouts.app')

@section('content')
<style type="text/css">
.form-group{
    margin-bottom: 0rem !important;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <a href="{{url('/')}}">
                    <img class="img-thumbnail" src="{{ asset('images/logo.png')}}" style="border: none;background-color: transparent;">
                  </a>
                    <p class="h4 text-center p-2 text-danger">{{ __('Register') }}</p>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="name" class="col-form-label">{{ __('Full Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" data-parsley-pattern="^[A-Z a-z]+$" data-parsley-trigger="keyup" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="mobile" class="col-form-label text-md-right">{{ __('Mobile Number') }}</label>
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="userClass" class="col-form-label text-md-right">{{ __('Class') }}</label>
                                <select id="userClass" name="userClass" class="form-control @error('userClass')  is-invalid @enderror" required="">
                                    <option value="">Choose..</option>
                                    @for ($i = 10; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                                @error('userClass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group row" style="margin-top: 10px;">
                            <div class="col-md-8 offset-md-2">
                                <label class="checkbox p-t-10 ">
                                    <input type="checkbox" name="terms_condition" id="terms_condition" class="checkbox " required>
                                        I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <div class="col-md-8 offset-md-2" style="margin-bottom: 10px;">
                                <div class="text-right p-t-8 p-b-31">
                                    Have an accont ?
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" type="submit" id="submit" name="submit">
                                        {{ __('Register') }}
                                    </button>
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
