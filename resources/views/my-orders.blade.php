@extends('main')

@section('title', 'Мои заказы')
@section('content')
<div class="cart-main-area pt-95 pb-100 wishlist">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginy">
                        <h3 class="cart-heading">Мои заказы</h3>                        
                        @foreach ($orders as $order)
                            <div class="table-content table-responsive">                            
                                <h6>№ ID заказа {{ $order->id }}</h6>                            
                                {{ presentDate($order->created_at) }} &nbsp;
                                {{ presentPrice($order->billing_total) }}                                                           
                                <table>
                                    <thead>
                                        <tr>                                            
                                            <th class="product-thumbnail">Фото</th>
                                            <th class="product-name">Название</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity2">Количество</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="" style="height:120px;"></a>
                                            </td>
                                            <td class="product-name"><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{ presentPrice($product->price) }} ₸</span></td>
                                            <td class="product-quantity2">{{ $product->pivot->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            @endforeach                        
                    </div>
                </div>
            </div>
</div>

@endsection

