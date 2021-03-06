@extends('layouts.master')
@section('title','登入')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">會員登入</div>
            <div class="card-body">
                @if($errors->has('msg'))
            <div class="form-group row">
                <div class="text-center text-danger">
                    {{ $errors->first('msg') }}
                </div>
            </div>
            @endif
            <div class="form-group">
                <form method="POST" action="{{ action('Auth\LoginController@login') }}" style="padding-right:30px;">
                    {{ csrf_field() }}
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">信箱</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">密碼</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">記住我</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                               登入
                                            </button>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                               忘記密碼?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 @endsection



