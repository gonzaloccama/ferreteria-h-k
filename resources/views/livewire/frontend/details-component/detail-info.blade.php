<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="detail-info">
        <h2 class="title-detail">{{ ucfirst(mb_convert_case($product->name, MB_CASE_LOWER, "UTF-8")) }}</h2>
        <div class="product-detail-rating">
            <div class="pro-details-brand">
                @if(isset($product->brand->name) && !empty($product->brand->name))
                    <span> Marca: <a href="javascript:;">{{ $product->brand->name }}</a></span>
                @endif
            </div>
            <?php
            $avgrating = 0;
            $averange = 0;

            foreach ($cnt = $product->orderItems->where('rstatus', 1) as $orderItem) {
                $avgrating += $orderItem->review->rating;
            }

            $averange = ($avgrating / $cnt->count()) * 100 / 5;
            ?>
            {{--{{ json_encode($cnt) }}--}}
{{--            <div class="product-rate-cover">--}}
{{--                @for($star = 1; $star < 6; $star++)--}}
{{--                    @if($star <= $averange)--}}
{{--                        <i class="simple-icon-star rating rating-star"></i>--}}
{{--                    @else--}}
{{--                        <i class="simple-icon-star rating"></i>--}}
{{--                    @endif--}}
{{--                @endfor--}}
{{--            </div>--}}
            <div class="product-rate-cover text-end">

                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width:{{ $averange }}%">
                    </div>
                </div>

                <span class="font-small ml-5 text-muted">
                    ({{ $cnt->count() }} calificaciones)
                </span>
            </div>
        </div>
        <div class="clearfix product-price-cover">
            <div class="product-price primary-color float-left">
                @if($s=$product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                    <ins><span class="text-brand">
                            S/ {{ number_format($product->sale_price, 2, '.', ',') }}
                        </span></ins>
                    <ins><span class="old-price font-md ml-15">
                            S/ {{ number_format( $product->regular_price, 2, '.', ',') }}
                        </span>
                    </ins>
                @else
                    <ins><span class="text-brand">S/ {{ number_format( $product->regular_price, 2, '.', ',') }}</span>
                    </ins>
                @endif
                {{--                                            <span class="save-price  font-md color3 ml-15">25% Off</span>--}}
            </div>
        </div>
        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
        <div class="short-desc mb-30">
            {!! $product->short_description !!}
        </div>
        <div class="product_sort_info font-xs mb-30">
            {{--                                        <ul>--}}
            {{--                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand--}}
            {{--                                                Warranty--}}
            {{--                                            </li>--}}
            {{--                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy--}}
            {{--                                            </li>--}}
            {{--                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>--}}
            {{--                                        </ul>--}}
        </div>
        {{--                                    <div class="attr-detail attr-color mb-15">--}}
        {{--                                        <strong class="mr-10">Color</strong>--}}
        {{--                                        <ul class="list-filter color-filter">--}}
        {{--                                            <li><a href="#" data-color="Red"><span class="product-color-red"></span></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="#" data-color="Yellow"><span--}}
        {{--                                                        class="product-color-yellow"></span></a></li>--}}
        {{--                                            <li class="active"><a href="#" data-color="White"><span--}}
        {{--                                                        class="product-color-white"></span></a></li>--}}
        {{--                                            <li><a href="#" data-color="Orange"><span--}}
        {{--                                                        class="product-color-orange"></span></a></li>--}}
        {{--                                            <li><a href="#" data-color="Cyan"><span--}}
        {{--                                                        class="product-color-cyan"></span></a></li>--}}
        {{--                                            <li><a href="#" data-color="Green"><span class="product-color-green"></span></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="#" data-color="Purple"><span--}}
        {{--                                                        class="product-color-purple"></span></a></li>--}}
        {{--                                        </ul>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="attr-detail attr-size">--}}
        {{--                                        <strong class="mr-10">Size</strong>--}}
        {{--                                        <ul class="list-filter size-filter font-small">--}}
        {{--                                            <li><a href="#">S</a></li>--}}
        {{--                                            <li class="active"><a href="#">M</a></li>--}}
        {{--                                            <li><a href="#">L</a></li>--}}
        {{--                                            <li><a href="#">XL</a></li>--}}
        {{--                                            <li><a href="#">XXL</a></li>--}}
        {{--                                        </ul>--}}
        {{--                                    </div>--}}
        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
        <div class="detail-extralink">

            <div class="detail-qty border radius">
                <a href="#" class="qty-down" wire:click.prevent="refreshQuantity(false)"><i
                        class="fi-rs-angle-small-down"></i></a>
                <span class="qty-val" wire:model="qty">{{ $qty }}</span>
                <a href="#" class="qty-up" wire:click.prevent="refreshQuantity"><i
                        class="fi-rs-angle-small-up"></i></a>
            </div>

            <div class="product-extra-link2">
                <button type="submit" class="button button-add-to-cart"
                        @if($s)
                        wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})"
                        @else
                        wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"
                    @endif >
                    Añadir al carrito
                </button>
                @if($witems->contains($product->id))
                    <a aria-label="Add To Wishlist" class="action-btn hover-up product-wish"
                       wire:click.prevent="removeFromWishlist({{$product->id}})"
                       href="javascript:;"><i class="fi-rs-heart"></i>
                    </a>
                @else
                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                       wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"
                       href="javascript:;"><i class="fi-rs-heart"></i>
                    </a>
                @endif
                {{--                                            <a aria-label="Compare" class="action-btn hover-up"--}}
                {{--                                               href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>--}}
            </div>
        </div>
        <ul class="product-meta font-xs color-grey mt-50">
            <li class="mb-5">SKU: <a href="#">{{ $product->SKU }}</a></li>
        </ul>
    </div>
    <!-- Detail Info -->
</div>
