@extends('main')

@section('title', 'Корзина')

@section('content')
<div class="cart-main-area  bg--white" style="margin-top: 80px;">
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
            <!-- <div class="container" style="padding-top: 80px;"> -->
                <!-- <div class="row" style="display: block;"> -->
                    <div class="col-md-12 col-sm-12 ol-lg-12">

                            <div class="table-content wnro__table table-responsive">
                            @if (Cart::count() > 0)

                                <h2>{{ Cart::count() }} товар(ов) в корзине</h2>
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Фото</th>
                                            <th class="product-name">Название</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity">Количество</th>
                                            <th class="product-subtotal">Сумма</th>
                                            <th class="product-remove">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr>

                                            <td class="product-thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="../storage/{{$item->model->image}}" alt="{{ $item->model->name }}"></a></td>
                                            <td class="product-name"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></td>
                                            <td class="product-price"><span class="amount">{{ presentPrice($item->price) }} ₸</span></td>
                                            <td class="product-quantity">
                                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                                    <input type="number" class="quantity" size="1" value="{{ $item->qty }}" name="quantity">

                                                                {{ csrf_field() }}
                                                                {{ method_field('PATCH') }}
                                                                <button class="btn btn-primary" title="" data-toggle="tooltip" type="submit" data-original-title="Обновить"><i class="fa fa-refresh"></i></button>
                                                </form>
                                            </td>
                                            <td class="product-subtotal">{{ presentPrice($item->price*$item->qty) }}</td>
                                            <td class="product-remove">
                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button  class="btn btn-danger" title="" data-toggle="tooltip" type="submit" data-original-title="Удалить">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="{{ route('shop.index') }}">Продолжить покупки</a></li>
                                <li><a href="{{ route('checkout.index') }}">Оформить заказ</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6" >
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                            </div>
                            <div class="cart__total__amount" style="margin-bottom: 80px;">
                                <span>Сумма</span>
                                <span>{{ presentPrice(Cart::subtotal()) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <section class="page_error bg--white">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="error__inner text-center">
                                    <div class="error__content">
                                        <p><h3>Корзина пуста</h3></p>
                                        <div class="search_form_wrapper">
                                            <a class="btn btn-default" href="{{ route('shop.index') }}" style="margin-bottom: 80px;">Продолжить покупки</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
            </div>
        </div>


@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="{{ asset('main_style/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('main_style/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('main_style/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('main_style/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('main_style/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('main_style/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('main_style/js/main.js') }}"></script>
@endsection
