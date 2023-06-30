@extends('main')
@section('title', 'Забыли пароль')
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
                                <h3>Забыли пароль?</h3>
                                    <p>Введите адрес электронной почты, связанный с вашей учетной записью. Нажмите «Отправить», чтобы получить пароль по электронной почте.</p>
                                    <form action="{{ route('password.email') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Введите email" id="email" class="form-control" />
                                        <div class="button-box">                                            
                                            <button type="submit" class="default-btn floatright">Отправить</button>
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
