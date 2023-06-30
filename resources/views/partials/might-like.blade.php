<div class="popular-product-area wrapper-padding-3 pt-45 ptb-95">
    <div class="container">
        <div class="section-title-9 text-center mb-50">
            <h2>Вам также может понравится</h2>
            </div>
        <div class="product-style">
            <div class="popular-product-active-2 owl-carousel">
              @foreach ($products as $product)
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product" height="200px"></a>
                        <div class="product-action">
                          <form action="{{ route('cart.store', $product) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" style="all:unset;"><a class="animate-top" title="Add To Cart"><i class="pe-7s-cart"></i></a></button>
                          </form>
                        </div>
                    </div>
                    <div class="funiture-product-content text-center">
                        <h4><a href="{{ route('shop.show', $product->slug) }}"><p>{{ $product->name }}</p></a></h4>
                        <span style="color: #e32024;">{{ $product->presentPrice() }}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
