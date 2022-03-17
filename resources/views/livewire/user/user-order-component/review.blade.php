<div class="card shadow">
    <div class="card-body">
        <div class="btn-toolbar nav justify-content-end"
             style="  padding: 5px 5px 2px 5px">
            <button type="button" class="btn-close align-self-end" wire:click.prevent="closeFrame"
                    aria-label="Close"></button>
        </div>
        <h4 style="position: absolute; margin-top: -20px; color: #545454; font-weight: 300" class="text-uppercase">
            {{ substr(strip_tags($review->product->name), 0, 20) }}
            {{ strlen(strip_tags($review->product->name)) > 20 ? "..." : "" }}
        </h4>
        <hr>


        <div class="p-30 border">
            <article class="row align-items-center">
                <figure class="col-md-4 mb-0">

                    <a href="{{ route('product.details', ['slug' => $review->product->slug]) }}">
                        <img alt="{{ $review->product->name }}" class="border"
                             src="{{ asset('assets/images/products/').'/'.$review->product->image }}" width="150">
                    </a>

                </figure>
                <div class="col-md-8 mb-0">
                    <h3>
                        <a href="{{ route('product.details', ['slug' => $review->product->slug]) }}">
                            {{ ucfirst(mb_convert_case($review->product->name, MB_CASE_LOWER, "UTF-8")) }}
                        </a>
                    </h3>
                    <div class="d-flex justify-content-between pt-10">
                        <h3 style="font-weight: 200;">S/ {{ number_format( $review->product->regular_price, 2, '.', ',') }}</h3>
                    </div>
                </div>
            </article>

            <!--comment form-->
            <div class="comment-form">
                <h4 class="mb-15">Agrega valoración</h4>

                @include('livewire.widgets.rating-stars', ['rating' => 5, 'name' => 'rating'])


                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="form-contact comment_form" action="#" id="commentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" id="comment" cols="30" rows="9"
                                                  wire:model="comment" placeholder="Escriba un comentario"></textarea>
                                        @error('comment') <span class="error text-danger fst-italic ml-5 mt-1">{!! $message !!}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary"
                                        wire:click.prevent="addReview" value="Guardar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="sticky-footer" class="d-grid gap-2 d-md-flex justify-content-md-end p-20 flex-shrink-0">
        <button class="btn btn-secondary btn-sm" wire:click.prevent="goBack"><i class="fas fa-arrow-left"></i>
            Regresar
        </button>
    </div>
</div>

