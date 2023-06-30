<!-- Header -->
<header id="wn__header" class="header__area header__absolute sticky__header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-6 col-lg-2">
        <div class="logo">
          <a href="/">
            <img src="../images/logo/logo.png" alt="logo images">
          </a>
        </div>
      </div>
      <div class="col-lg-8 d-none d-lg-block">
        <nav class="mainmenu__nav">
          <ul class="meninmenu d-flex justify-content-start">
            <li><a href="/">Главная</a></li>
            <li><a href="/shop">Каталог</a></li>
            <li><a href="/about">О Компании</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/news">Услуги</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-md-8 col-sm-8 col-5 col-lg-2">
        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
          <li class="shop_search"><a class="search__active" href="#"></a></li>
          @if (Cart::instance('default')->count() > 0)
          <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">{{ Cart::instance('default')->count()}}</span></a>
          @else
          <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">0</span></a>
          @endif
            <!-- Start Shopping Cart -->
            <div class="block-minicart minicart__active">
              <div class="minicart-content-wrapper">
                <div class="micart__close">
                  <span>Закрыть</span>
                </div>
                <div class="items-total d-flex justify-content-between">
                  <span>{{ Cart::instance('default')->count()}} товар(ов)</span>
                  <span>Общая сумма</span>
                </div>
                <div class="total_amount text-right">
                  <span>{{ presentPrice(Cart::subtotal()) }}</span>
                </div>
                <div class="mini_action checkout">
                  <a class="checkout__btn" href="{{ route('checkout.index') }}">Оформить заказ</a>
                </div>
                <div class="single__items">
                  <div class="miniproduct">
                  @foreach (Cart::content() as $item)
                    <div class="item01 d-flex">
                      <div class="thumb">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="../storage/{{$item->model->image}}" alt="{{ $item->model->name }}"></a>
                      </div>
                      <div class="content">
                        <h6><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></h6>
                        <!-- <span class="prize">{{ presentPrice($item->price) }}</span> -->
                        <div class="product_prize d-flex justify-content-between">
                          <span class="qun">Количество: {{ $item->qty }}</span>
                          <ul class="d-flex justify-content-end">
                            <li>
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button class="btn btn-danger btn-xs" title="Remove" type="submit"><i class="fa fa-times"></i></button>
                            </form>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  </div>
                </div>
                <div class="mini_action cart">
                  <a class="cart__btn" href="{{ route('cart.index') }}">Перейти в корзину</a>
                </div>
              </div>
            </div>
            <!-- End Shopping Cart -->
          </li>
          <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
            <div class="searchbar__content setting__block">
              <div class="content-inner">
                <div class="switcher-currency">
                  <strong class="label switcher-label">
                    <span>Мой аккаунт</span>
                  </strong>
                  <div class="switcher-options">
                    <div class="switcher-currency-trigger">
                      <div class="setting__menu">
                      @guest
                        <span><a href="{{ route('login') }}">Войти</a></span>
                        <span><a href="{{ route('register') }}">Регистрация</a></span>
                      @else
                        <span><a href="{{ route('users.edit') }}">Личный кабинет</a></span>
                        <span><a href="{{ route('orders.index') }}">Мои заказы</a></span>
                        <span><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><span>Выйти</span></a></span>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                      @endguest
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    </div>
    <!-- Start Mobile Menu -->
    <div class="row d-none">
      <div class="col-lg-12 d-none">
        <nav class="mobilemenu__nav">
          <ul class="meninmenu">
            <li><a href="/">Главная</a></li>
            <li><a href="/shop">Каталог</a></li>
            <li><a href="/about">О Компании</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/news">Услуги</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- End Mobile Menu -->
          <div class="mobile-menu d-block d-lg-none">
          </div>
          <!-- Mobile Menu -->	
  </div>		
</header>
<!-- //Header -->
<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">

  <form id="search_mini_form" class="minisearch" action="{{ route('search') }}" method="GET">
    <div class="field__search">
      <input type="text" placeholder="Поиск..." name="query" id="query" value="{{ request()->input('query') }}" required>
      <div class="action">
        <a href="#"><i class="zmdi zmdi-search"></i></a>
      </div>
    </div>
  </form>
  <div class="close__wrap">
    <span>закрыть</span>
  </div>
</div>
<!-- End Search Popup -->