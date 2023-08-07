<div class="ss06_product">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="title_home_in">
                    <h2><i class="fas fa-eye"></i> Sản phẩm vừa xem</h2>
                </div>
            </div>
            <div class="col-sm-12 col-12">
                @if( isset($products) && $products->count()>0 )
                <div class="list-product">
                    @foreach ($products as $product)
                    @php
                    $tran=$product->translationsLanguage()->first();
                    // $link= route('product.detail',['category'=>$product->category->slug, 'slug'=>$product->slug]);
                    @endphp
                    <div class="col-product-item">
                        <div class="product-item">
                            <div class="box">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ $product->avatar_path != null ?  asset($product->avatar_path) : asset('frontend/images/no-images.jpg') }}" alt="{{ $tran->name }}">
                                        @if ($product->old_price && $product->price)
                                        <span class="sale"> {{ceil(100 -($product->price)*100/($product->old_price))."%"}} </span>
                                        @endif
                                        @if($product->baohanh)
                                        <div class="km">
                                            {{ $product->baohanh }}
                                        </div>
                                        @endif
                                    </a>

                                </div>
                                <div class="content">
                                    <h3><a href="#">{{ $tran->name }}</a></h3>
                                    <div class="box-price">
                                        @if ($product->price)
                                        <span class="new-price">{{ number_format($product->price) }}đ</span>

                                        @else
                                        <span class="new-price">Liên hệ</span>
                                        @endif
                                        @if ($product->old_price>0)
                                        <span class="old-price">{{ number_format($product->old_price) }}đ</span>
                                        @endif
                                    </div>
                                    <button class="buy-now addCart add-to-cart" data-url="{{ route('cart.add',['id' => $product->id]) }}" data-start="{{ route('cart.add',['id' => $product->id,]) }}" data-info="{{ __('home.them_san_pham') }}" data-agree="{{ __('home.dong_y') }}" data-skip="{{ __('home.huy') }}" data-addfail="{{ __('home.them_san_pham_that_bat') }}">Chọn mua</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $('.list-product').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1500,
        pauseOnHover: true,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,

                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
</script>