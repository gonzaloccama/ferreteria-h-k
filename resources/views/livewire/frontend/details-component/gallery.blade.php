<div class="col-md-6 col-sm-12 col-xs-12" wire:ignore>
    <div class="detail-gallery">
        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
        <!-- MAIN SLIDES -->
        <?php
        $gallery = json_decode($product->images);
        ?>
        <div class="product-image-slider">

            <figure class="border-radius-10">
                <img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                     alt="product image" style="width: 860px">
            </figure>
            @if(filled($gallery))
                @foreach($gallery as $glr)
                    <figure class="border-radius-10">
                        <img src="{{ asset('assets/images/products/gallery/').'/'.$glr }}"
                             alt="product image" style="width: 860px">
                    </figure>
                @endforeach
            @endif
        </div>
        <!-- THUMBNAILS -->
        <div class="slider-nav-thumbnails pl-15 pr-15">
            <div><img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                      alt="product image"></div>
            @if(filled($gallery))
                @foreach($gallery as $glr)
                    <div>
                        <img src="{{ asset('assets/images/products/gallery/').'/'.$glr }}"
                             alt="product image">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- End Gallery -->
    <div class="social-icons single-share">
        <ul class="text-grey-5 d-inline-block">
            <li><strong class="mr-10">Share this:</strong></li>
            <li class="social-facebook"><a href="#"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook.svg') }}"
                        alt=""></a></li>
            <li class="social-twitter"><a href="#"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter.svg') }}"
                        alt=""></a></li>
            <li class="social-instagram"><a href="#"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram.svg') }}"
                        alt=""></a></li>
            <li class="social-linkedin"><a href="#"><img
                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-pinterest.svg') }}"
                        alt=""></a></li>
        </ul>
    </div>
</div>
