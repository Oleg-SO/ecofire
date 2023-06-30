@extends('main')

@section('title', 'Регистрация')

@section('content')
<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Новый пользователь</h3>
                            <form method="POST" action="{{ route('register') }}">
                                 {{ csrf_field() }}
								<div class="account__form">
                                    <div class="input__box">
                                        <label>Имя <span>*</span></label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя" required autofocus>
                                    </div>
									<div class="input__box">
                                        <label>Email <span>*</span></label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
									</div>
									<div class="input__box">
										<label>Пароль<span>*</span></label>
                                        <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Пароль" required>
                                    </div>
                                    <div class="input__box">
										<label>Подтверждение пароля<span>*</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Пароль" required>
									</div>
									<div class="form__btn">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        <button type="submit">Зарегистрироваться</button>							
                                    </div>
                                    <div class="already-have-container">
                                        <p><strong>Уже есть аккаунт?</strong></p>
                                        <a href="{{ route('login') }}">Войти</a>
                                    </div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						
					</div>
				</div>
			</div>
</section>           
     
@endsection
