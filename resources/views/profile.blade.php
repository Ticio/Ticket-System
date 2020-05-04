@extends('layouts.app') 


@section('css')
    .panel-heading .dropdown{
        display: none;
    }
@endsection

@section('content')
<div class="user-profile-update-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-widget">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>User Details</h4>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <form class="form-common" method="POST" action="{{ route('user_details') }}">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Name *') }}</label>

                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger" style="font-size: 9px">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger" style="font-size: 9px">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <select name="role_id" class="form-control mt-3" required>
                                                    <option disabled>User Category</option>
                                                    @foreach (App\Role::all() as $element)
                                                        @if($element->name != "admin" && $element->name != "user" && $element->name != "admin")
                                                            <option value="{{ $element->id }}">{{ $element->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" class="listing-btn-large">Update Details</button>
                                        </form>
                                    </div><!--panel Body -->
                                </div><!--panel -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-widget">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>Change Password</h4>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-common" method="POST" action="{{ route('password') }}">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="password" class="col-form-label text-md-right">{{ __('New Password *') }}</label>

                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger" style="font-size: 9px">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>                                                                                          

                                            <button type="submit" class="listing-btn-large">Update Password</button>
                                        </form>
                                    </div><!--panel Body -->
                                </div><!--panel -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection