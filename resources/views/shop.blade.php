@extends('main')

@section('title', 'Продукты')


@section('content')


<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area bg-image--4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Каталог</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Главная</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">Каталог</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Категории продуктов</h3>
									@foreach($categories as $category)
									<ul>
										<li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }} <span>({{ $category->products()->count() }})</span></a></li>
									</ul>
									@endforeach
        					</aside>
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
									<form action="{{ route('shop.index')}}" method="GET" id="selectform">
										<div class="orderby__wrapper">
											<span>Сортировать</span>
												<select class="shot__byselect" name="sort" form="selectform" >
													<option value="none">Поумолчанию</option>
													<option value="low_high">Цена по возрастанию</option>
													<option value="high_low">Цена по убыванию</option>
													<option value="a_to_z">Название А-Я</option>
													<option value="z_to_a">Название Я-А</option>
												</select>
										</div>
									</form>

		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row" id="select-res">
	        						<!-- Start Single Product -->
									@forelse ($products as $product)
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>
											<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>

										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h4>
											<div class="kaspimerchant">
												<div class="ks-widget"
													data-template="button"
													data-merchant-sku="{{$product->details}}"
													data-merchant-code="9813024"
													data-city="750000000"
												></div>
												<div class="product__info__main">
													@if($product->price == 0)
													<div class="price-box">
                                                        <span>Уточняйте цену</span>
                                                    </div>
													@endif
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
		        					</div>
									@empty
									<div style="text-align: left; margin-left: 15px;">Товары отсутсвуют</div>
									@endforelse
		        					<!-- End Single Product -->

	        					</div>
								{{ $products->appends(request()->input())->links() }}
	        					
	        				</div>
	        				<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper" id="select-result">
								@forelse ($products as $product)
	        						<!-- Start Single Product -->
	        						<div class="list__view">
	        							<div class="thumb">
	        								<a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{ $product->image }}" alt="{{ $product->name }}"></a>
	        								<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{ $product->image }}" alt="{{ $product->name }}"></a>
	        							</div>
	        							<div class="content">
	        								<h2><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h2>
	        								<ul class="rating d-flex">
													@for($i = 0; $i < ceil($product->reviews->avg('rating')); $i++)
													<li class="on"><i class="fa fa-star-o"></i></li>
													@endfor
													@for($i = 0; $i < 5-ceil($product->reviews->avg('rating')); $i++)
													<li><i class="fa fa-star-o"></i></li>
													@endfor
											</ul>
	        								<ul class="prize__box">
											@if($product->price == 0)
													<div class="price-box">
                                                        <span>Уточняйте цену</span>
                                                    </div>
													@endif
	        									<!-- <li class="old__prize">$220.00</li> -->
	        								</ul>
											<div class="kaspimerchant">
												<div class="ks-widget"
													data-template="button"
													data-merchant-sku="{{$product->details}}"
													data-merchant-code="9813024"
													data-city="750000000"
												></div>
											</div>
	        								<p><?= $product->description ?></p>
	        								<ul class="cart__action d-flex">
	        									<li class="cart">
													<form action="{{ route('cart.store', $product) }}" method="POST" id="myform">
														{{ csrf_field() }}
														<input type="hidden" name="price" value="price_soft">
														<button type="submit" style="border:none; all:unset;"><a class="cart">В корзину</a></button>
													</form>
												</li>
	        								</ul>

	        							</div>
	        						</div>
	        						<!-- End Single Product -->
								@empty
								<div style="text-align: left">Товары отсутсвуют</div>
								@endforelse
	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
		<!-- End Shop Page -->




@endsection
