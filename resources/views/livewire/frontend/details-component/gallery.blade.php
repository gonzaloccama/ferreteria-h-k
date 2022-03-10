<div class="col-md-6 col-sm-12 col-xs-12" wire:ignore>
    <div class="detail-gallery">
        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
        <!-- MAIN SLIDES -->
        <div class="product-image-slider">

            <figure class="border-radius-10">
                <img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                     alt="product image">
            </figure>

            <figure class="border-radius-10">
                <img src="{{ asset('assets/images/products/1627864043.jpg') }}"
                     alt="product image">
            </figure>

        </div>
        <!-- THUMBNAILS -->
        <div class="slider-nav-thumbnails pl-15 pr-15">
            <div><img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                      alt="product image"></div>
            <div><img src="{{ asset('assets/images/products/1627864043.jpg') }}"
                      alt="product image"></div>

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
