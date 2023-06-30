@extends('main')

@section('title', 'Логин')

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
							<h3 class="account__title">Уже есть аккаунт</h3>
							<form action="{{ route('login') }}" method="POST">
                                 {{ csrf_field() }}
								<div class="account__form">
									<div class="input__box">
                                        <label>Email <span>*</span></label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Введите Email" required autofocus>
									</div>
									<div class="input__box">
										<label>Пароль<span>*</span></label>
                                        <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Введите пароль" required>
									</div>
									<div class="form__btn">
										<button type="submit">Войти</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="remember"  type="checkbox" {{ old('remember') ? 'checked' : '' }}>
											<span>Запомнить меня</span>
										</label>
                                    </div>
                                    <a class="forget_pass" href="{{ route('password.request') }}">
                                        Забыли пароль?
                                    </a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Новый покупатель</h3>
							<div class="spacer"></div>
                            <p><strong>Сохраните свое время</strong></p>
                            <p>Вам не нужен аккаунт чтобы оформить заказ.</p>
                            <div class="spacer"></div>
                            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">Продолжить как гость</a>
                            <div class="spacer"></div>
                            &nbsp;
                            <div class="spacer"></div>                            
                            <p>Создайте аккаунт для просмотра истории заказов</p>
                            <div class="spacer"></div>
                            <a href="{{ route('register') }}" class="auth-button-hollow">Создать аккаунт</a>

						</div>
					</div>
				</div>
			</div>
</section>
@endsection
