@extends('main')

@section('title', 'Заказ')

@section('content')
<div class="checkout-area ptb-100">
    <div class="container">
    @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          @if($error = 'validation.required')
                           <li>Не заполнены объязательные поля</li>
                          @else
                            <li>{{ $error }}</li>
                          @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="coupon-accordion"> -->
                    <!-- ACCORDION START -->
                    <!-- <h3 class="have-account">Есть аккаунт? &nbsp; <span id="showlogin">Нажмите чтобы войти</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                          <div class="row">
                            <div class="col-sm-6">
                                <h2>Новый пользователь</h2>
                                <p>Варианты:</p>
                                <div class="radio">
                                    <a href="{{ route('guestCheckout.index') }}" class="btn btn-primary">Продолжить как гость</a>     
                                </div>
                                <div class="radio">                    
                                <p>Создав аккаунт, вы сможете делать покупки быстрее и отслеживать заказы, которые вы сделали ранее.</p>
                                <a class="btn btn-primary" href="{{ route('register') }}">Создать аккаунт</a>                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <h2>Зарегистрированный пользователь</h2>           
                                  <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                      <label for="input-email" class="control-label">Email</label>
                                      <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email') }}" name="email">
                                  </div>
                                  <div class="form-group">
                                      <label for="input-password" class="control-label">Пароль</label>
                                      <input type="password" class="form-control" id="password" placeholder="Введите пароль" value="{{ old('password') }}" name="password">
                                      <a href="{{ route('password.request') }}">Забыли пароль</a>
                                  </div>
                                  <input type="submit" class="btn btn-primary" value="Войти">
                                  </form>  
                            </div>
                          </div>
                        </div>
                    </div> -->
                    <!-- ACCORDION END -->
                    					
                <!-- </div> -->
            </div>
        </div>
        <div class="row" style="margin-top: 120px; margin-bottom: 60px;">
            <div class="col-lg-6 col-md-12 col-12">
              <h3>Адрес доставки заказа:</h3>
            <form class="form-horizontal" action="{{ route('checkout.store') }}" method="POST">
              {{ csrf_field() }}
                <div id="shipping-new">
                  <div class="form-group required">
                    <label for="input-shipping-firstname" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Введите имя" value="{{ old('name') }}" name="name">
                    </div>
                  </div>
                  <div class="form-group required">
                    <label for="input-shipping-lastname" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                            @if (auth()->user())
                            <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ auth()->user()->email }}" name="email">
                            @else
                            <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email') }}" name="email">
                             @endif
                    </div>
                  </div>
                  <div class="form-group required">
                    <label for="input-shipping-company" class="col-sm-2 control-label">Адрес</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" placeholder="Введите адрес" value="{{ old('address') }}" name="address">
                    </div>
                  </div>                 
                  <div class="form-group required">
                    <label for="input-shipping-address-2" class="col-sm-2 control-label">Город</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" placeholder="Введите город" value="{{ old('city') }}" name="city">
                    </div>
                  </div>
                  <div class="form-group required">
                    <label for="input-shipping-city" class="col-sm-2 control-label">Телефон</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" placeholder="Введите номер телефона" value="{{ old('phone') }}" name="phone">
                    </div>
                  </div>  
                </div>
            </div>	
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Ваш заказ</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Название</th>
                                    <th class="product-total">Цена</th>
                                </tr>							
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr class="cart_item">
                                    <td class="product-name">
                                     {{ $item->model->name }} <strong class="product-quantity"> × {{ $item->qty }}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">{{ $item->model->presentPrice()}}</span>
                                    </td>
                                </tr>  
                                @endforeach                             
                            </tbody>
                            <tfoot>                               
                                <tr class="order-total">
                                    <th>Общая сумма</th>
                                    <td><strong><span class="amount">{{ presentPrice(Cart::subtotal()) }}</span></strong>
                                    </td>
                                </tr>								
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">                           
                            <div class="order-button-payment">
                                <button class="btn btn-button checkout-btn"><input type="submit" style="all:unset;" value="Оформить заказ" /></button>
                            </div>								
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection