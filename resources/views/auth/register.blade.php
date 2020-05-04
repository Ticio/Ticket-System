@extends('layouts.auth_app')

@section('content')
    <div class="user-form-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                    <div class="registration-form-block pb-2">
                        <div class="registration-form-title">
                            <h4>Sign up</h4>
                        </div>
                        <div class="form-block">
                            <form class="form-common" method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Name *') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger" style="font-size: 10px">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <span class="invalid-feedback text-justify d-inline-block text-danger" style="margin-top: 3px; font-size: 10px; line-height: 14px;">
                                        <strong>must have </strong>English uppercase characters (A – Z), English lowercase characters (a – z), Base 10 digits (0 – 9), Non-alphanumeric (For example: !, $, #, or %), Unicode characters
                                    </span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger" style="font-size: 10px">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>                                                                                          

                                <div class="form-group">
                                    <select name="role_id" class="form-control mt-3" required>
                                        <option disabled selected>User Category</option>
                                        @foreach (App\Role::all() as $element)
                                            @if($element->name != "admin" && $element->name != "user" && $element->name != "admin")
                                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4 form-group">
                                    <div class="form-btn-block">
                                        <button type="submit" class="form-btn font-weight-bold">Sign up</button>
                                    </div>
                                </div>
                            </form>
                            <div class="signin-others-option-block">
                                <h5>Already a Member? <a href="{{ route('login') }}">Sign in</a></h5>
                            </div>
                        </div>
                    </div>
                    <!-- panel -->
                </div>
            </div>
        </div>
    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
