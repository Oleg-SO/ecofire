@extends('main')

@section('title', $product->name)


@section('content')


 <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area bg-image--4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Продукт</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Главная</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">Продукт</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <a href="../storage/{{$product->image}}" data-lightbox="mygallery" data-title="{{ $product->name }}">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" >
                                        <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                                        @if($product->price == 0)
													<div class="price-box">
                                                        <span>Уточняйте цену</span>
                                                    </div>
													@endif
                                        <!-- @if($product->images)
                                        @foreach(json_decode($product->images,true) as $image) -->
                                        <!-- <a href="{{ productImage($image) }}" data-lightbox="mygallery"> -->
                                        <!-- @endforeach
                                        @endif -->

                                        @if (!empty($image))
                                            <a href="{{ productImage($image) }}" data-lightbox="mygallery">
                                                <!-- Ваш код для отображения изображения -->
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product__info__main">
                                <h1>{{ $product->name }}</h1>
                                
                                <h6>Модель - {{ $product->details }}</h6>
                                @if(empty($product->sale_price))
                                <div class="price-box">
                                    <span>Цена 
                                        - {{ presentPrice($product->price) }}
                                         &#x20B8;</span>
                                </div>
                                @else
                                <div class="price-box-sale">
                                    <span>Цена - {{ presentPrice($product->price) }} &#x20B8;</span>
                                </div>
                                    <div class="new-year-price">Цена по Акции</div>
                                    <div class="present-price">{{ presentPrice($product->sale_price) }}&#x20B8;</div>
                                @endif
                                <div class="product-reviews-summary d-flex">
                                    <ul class="rating-summary d-flex">
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                    </ul>
                                </div>
                                <p><a class="floating-button" href="../instrukciya-ecofire.pdf" download>Инструкция</a></p>
                                <div class="product__overview">
                                    <p class="product-desc"> <?= $product->description ?></p>
                                </div>
                                <div class="box-tocart d-flex">
                                    <span>Количество</span>
                                    <input id="qty" class="input-text qty" name="qty" value="1" type="number">
                                        <form action="{{ route('cart.store', $product) }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="addtocart__actions">
                                                <button class="tocart" type="submit" title="Добавить">В корзину</button>
                                            </div>
                                            <div class="kaspimerchant">
                                                <div class="ks-widget"
                                                    data-template="button"
                                                    data-merchant-sku="{{$product->details}}"
                                                    data-merchant-code="9813024"
                                                    data-city="750000000">
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cpt_product_specs">
                    <p><h4>Характеристики</h4></p><br>
                        @if($specs)
                            @foreach($specs as $spec)
                                @foreach($spec as $_spec)
                                    <p><span class="spec-name">{{ $_spec->name }}:</span>&nbsp;
                                        @foreach($product_specs as $product_spec)
                                            @if($product_spec->specification_id === $_spec->id)
                                                <span class="spec-value">{{ $product_spec->value }}</span><hr>
                                            @endif
                                        @endforeach
                                    </p>
                                @endforeach
                            @endforeach
                        @endif
                 </div>

                <hr>
                <div class="wn__related__product" style="margin-top: 60px;">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Вас могут заинтересовать</h2>
                    </div>
                    <div class="row mt--60">
                        <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                            <!-- Start Single Product -->
                            @forelse ($products as $product)
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>
											<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>

										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                            <div class="product__info__main">
                                                    @if(empty($product->sale_price))
                                                    <div class="price-box">
                                                        <span>Цена 
                                                            - {{ presentPrice($product->price) }}
                                                            &#x20B8;</span>
                                                    </div>
                                                    @else
                                                    <div class="price-box-sale">
                                                        <span>Цена - {{ presentPrice($product->price) }} &#x20B8;</span>
                                                    </div>
                                                        <div class="new-year-price">Цена по Акции</div>
                                                        <div class="present-price">{{ presentPrice($product->sale_price) }}&#x20B8;</div>
                                                    @endif
                                            </div>
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
											<!-- <div class="product__hover--content">
												<ul class="rating d-flex">
													@for($i = 0; $i < ceil($product->reviews->avg('rating')); $i++)
													<li class="on"><i class="fa fa-star"></i></li>
													@endfor
													@for($i = 0; $i < 5-ceil($product->reviews->avg('rating')); $i++)
													<li><i class="fa fa-star-o"></i></li>
													@endfor
												</ul>
											</div> -->
										</div>
		        					</div>
									@empty
									<div style="text-align: left; margin-left: 15px;">Товары отсутсвуют</div>
									@endforelse
                            <!-- Start Single Product -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End main Content -->
@endsection
