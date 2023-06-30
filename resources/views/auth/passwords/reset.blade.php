@extends('main')
@section('title', 'Восстановление')
@section('content')
<div class="register-area ptb-100">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                <h3>Восстановление пароля</h3>
                                      <form action="{{ route('password.request') }}" method="post" enctype="multipart/form-data">
                                      {{ csrf_field() }}  
                                      <input type="hidden" name="token" value="{{ $token }}">
                                        <input type="email" id="email" name="email" placeholder="Введите email" value="{{ old('email') }}">
                                        <input type="password" id="password" placeholder="Введите пароль" value="{{ old('password') }}" name="password">
                                        <input type="password" name="password_confirmation" value="" placeholder="Подтвердите пароль" id="password-confirm" class="form-control" />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">                                               
                                                <a href="{{ route('password.request') }}">Забыли пароль?</a>
                                            </div>
                                            <button type="submit" class="default-btn floatright">Восстановить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection
