<div class="widget-category mb-30" wire:ignore.self>
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">CATEGORIAS</h5>
    <ul class="categories">
        @php
            $i = 0;
        @endphp
        @foreach($categories as $category)
            @if($i++ < 6)
                <li>
                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                </li>
            @elseif($i++ >= 6)
                <li>
                    <ul class="more_slide_open" style="display: none;">
                        <li>
                            <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                        </li>
                    </ul>
                </li>
            @endif
        @endforeach
        @if($i > 6)
            <div class="more_categories btn-link fw-bolder">Mostrar más...</div>
        @endif
    </ul>
</div>
<!-- Fillter By Price -->
<div class="sidebar-widget price_range range mb-30">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">FILTRAR POR PRECIO</h5>
        <div class="bt-1 border-color-1"></div>
    </div>

    <div class="price-filter">
        <div class="price-filter-inner">
            <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                <div id="slider" wire:ignore></div>
            </div>
            <div class="label-input">
                <input type="text" class="text-primary fw-bolder" readonly
                       value="S/ {{ $min_price }}   —   S/ {{ $max_price }}"/>
            </div>
        </div>
    </div>

</div>


<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">MARCAS DE PRODUCTOS</h5>

    <ul class="categories">

        <?php
            $brands = \App\Models\Brand::paginate(10);
        ?>

        @foreach($brands as $brand)
            <li>
                <a href="{{ route('product.brand') . '?brand=' . $brand->id }}">{{ $brand->name }}</a>
            </li>
        @endforeach

    </ul>

</div>

<!-- Product sidebar Widget -->
<div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10" wire:ignore>
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">NUEVOS PRODUCTOS</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
    @foreach($lproducts as $lproduct)
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ asset('assets/images/products/').'/'.$lproduct->image }}" alt="#">
            </div>
            <div class="content pt-10">
                <h5><a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">{{ $lproduct->name }}</a></h5>
                <p class="price mb-0 mt-5">S/ {{ $lproduct->regular_price }}</p>
                <div class="product-rate">
                    <div class="product-rating" style="width:90%"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{--                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">--}}
{{--                        <img src="{{ asset('assets/frontend/imgs/banner/banner-11.jpg') }}" alt="">--}}
{{--                        <div class="banner-text">--}}
{{--                            <span>Women Zone</span>--}}
{{--                            <h4>Save 17% on <br>Office Dress</h4>--}}
{{--                            <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
