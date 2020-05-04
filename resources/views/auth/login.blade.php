@extends('layouts.auth_app')

@section("css")

@endsection

@section('content')
    <div class="user-form-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                    <div class="registration-form-block pb-2">
                        <div class="registration-form-title">
                            <h4>Sign in</h4>
                        </div>
                        <div class="form-block">
                            <form class="form-common" method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger" style="font-size: 10px">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password *') }}</label>

                                    <input type="password" name="password" class="form-control" id="password" autocomplete="false">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger" style="font-size: 10px">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row form-check-row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-check">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Remember Me</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="forgot-link-block">
                                                <a href="{{ route('password.request') }}" class="forgot-link">Forget Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 form-group">
                                    <div class="form-btn-block">
                                        <button type="submit" class="form-btn font-weight-bold">Sign in</button>
                                    </div>
                                </div>
                            </form>
                            <div class="signin-others-option-block">
                                <h5>Not a Member? <a href="{{ route('register') }}">Sign up</a></h5>
                            </div>
                        </div>
                    </div>
                    <!-- panel -->
                </div>
            </div>
        </div>
    </div>
@endsection
