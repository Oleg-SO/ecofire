@extends('main')

<title>Поиск - {{ request()->input('query') }}</title>

@section('content')
<div class="header-bottom-furniture wrapper-padding-2 border-top-3">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <div class="furniture-login">
                        <ul>
                            <li>ПОИСК:</li>
                        </ul>
                    </div>
                    <div class="furniture-search">
                        <form action="{{ route('search') }}" method="GET">
                            <input placeholder="Поиск товара   . . ." type="text" name="query" id="query" value="{{ request()->input('query') }}" required>
                            <button>
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <h1 style="margin: 60px 60px;">Вы искали '{{ request()->input('query') }}'</h1>
        <div class="container" style="margin-bottom: 60px;">
        <div class="shop-product-content tab-content">
            <div id="grid-sidebar7" class="tab-pane fade active show">
                <div class="row">
                    @forelse ($products as $product)
                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="product__thumb">
                            <a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" style="height: 200px;" alt="{{ $product->name }}"></a>

                        </div>
                        <div class="product__content content--center">
                            <h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            <ul class="prize d-flex">
                                <li>{{ presentPrice($product->price) }}</li>
                                <!-- <li class="old_prize">$35.00</li> -->
                            </ul>
                            <div class="action">
                                <div class="actions_inner">
                                    <ul class="add_to_links">

                                        <li>
                                            <form action="{{ route('cart.store', $product) }}" method="POST" id="myform">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="price" value="price_soft">
                                                <button type="submit" style="border:none; all:unset;"><a class="cart"><i class="bi bi-shopping-cart-full"></i></a></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__hover--content">
                                <ul class="rating d-flex">
                                    @for($i = 0; $i < ceil($product->reviews->avg('rating')); $i++)
                                    <li class="on"><i class="fa fa-star"></i></li>
                                    @endfor
                                    @for($i = 0; $i < 5-ceil($product->reviews->avg('rating')); $i++)
                                    <li><i class="fa fa-star-o"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div style="text-align: left; margin-left: 15px;">Товары отсутсвуют</div>
                    @endforelse
                </div>
            </div>
        </div>
        {{ $products->appends(request()->input())->links() }}
      </div>

@endsection
